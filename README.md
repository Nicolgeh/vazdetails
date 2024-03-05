<!DOCTYPE html>
<html>
<head>
  <title>Basic Tetris HTML Game</title>
  <meta charset="UTF-8">
  <style>
  html, body {
    height: 100%;
    margin: 0;
  }

  body {
    background: black;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  canvas {
    border: 1px solid white;
  }
  </style>
</head>
<body>
<canvas width="320" height="640" id="game" style="border: 2px solid black;"></canvas>
<script>
// https://tetris.fandom.com/wiki/Tetris_Guideline

// get a random integer between the range of [min,max]
// @see https://stackoverflow.com/a/1527820/2124254
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);

  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// generate a new tetromino sequence
// @see https://tetris.fandom.com/wiki/Random_Generator
function generateSequence() {
  const sequence = ['I', 'J', 'L', 'O', 'S', 'T', 'Z'];

  while (sequence.length) {
    const rand = getRandomInt(0, sequence.length - 1);
    const name = sequence.splice(rand, 1)[0];
    tetrominoSequence.push(name);
  }
}

// get the next tetromino in the sequence
function getNextTetromino() {
  if (tetrominoSequence.length === 0) {
    generateSequence();
  }

  const name = tetrominoSequence.pop();
  const matrix = tetrominos[name];

  // I and O start centered, all others start in left-middle
  const col = playfield[0].length / 2 - Math.ceil(matrix[0].length / 2);

  // I starts on row 21 (-1), all others start on row 22 (-2)
  const row = name === 'I' ? -1 : -2;

  return {
    name: name,      // name of the piece (L, O, etc.)
    matrix: matrix,  // the current rotation matrix
    row: row,        // current row (starts offscreen)
    col: col         // current col
  };
}

// rotate an NxN matrix 90deg
// @see https://codereview.stackexchange.com/a/186834
function rotate(matrix) {
  const N = matrix.length - 1;
  const result = matrix.map((row, i) =>
    row.map((val, j) => matrix[N - j][i])
  );

  return result;
}

// check to see if the new matrix/row/col is valid
function isValidMove(matrix, cellRow, cellCol) {
  for (let row = 0; row < matrix.length; row++) {
    for (let col = 0; col < matrix[row].length; col++) {
      if (matrix[row][col] && (
          // outside the game bounds
          cellCol + col < 0 ||
          cellCol + col >= playfield[0].length ||
          cellRow + row >= playfield.length ||
          // collides with another piece
          playfield[cellRow + row][cellCol + col])
        ) {
        return false;
      }
    }
  }

  return true;
}

// place the tetromino on the playfield
function placeTetromino() {
  for (let row = 0; row < tetromino.matrix.length; row++) {
    for (let col = 0; col < tetromino.matrix[row].length; col++) {
      if (tetromino.matrix[row][col]) {

        // game over if piece has any part offscreen
        if (tetromino.row + row < 0) {
          return showGameOver();
        }

        playfield[tetromino.row + row][tetromino.col + col] = tetromino.name;
      }
    }
  }

  // check for line clears starting from the bottom and working our way up
  for (let row = playfield.length - 1; row >= 0; ) {
    if (playfield[row].every(cell => !!cell)) {

      // drop every row above this one
      for (let r = row; r >= 0; r--) {
        for (let c = 0; c < playfield[r].length; c++) {
          playfield[r][c] = playfield[r-1][c];
        }
      }
    }
    else {
      row--;
    }
  }

  tetromino = getNextTetromino();
}

// show the game over screen
function showGameOver() {
  cancelAnimationFrame(rAF);
  gameOver = true;

  context.fillStyle = 'black';
  context.globalAlpha = 0.75;
  context.fillRect(0, canvas.height / 2 - 30, canvas.width, 60);

  context.globalAlpha = 1;
  context.fillStyle = 'white';
  context.font = '36px monospace';
  context.textAlign = 'center';
  context.textBaseline = 'middle';
  context.fillText('GAME OVER!', canvas.width / 2, canvas.height / 2);
}

const canvas = document.getElementById('game');
const context = canvas.getContext('2d');
const grid = 32;
const tetrominoSequence = [];

// keep track of what is in every cell of the game using a 2d array
// tetris playfield is 10x20, with a few rows offscreen
const playfield = [];

// populate the empty state
for (let row = -2; row < 20; row++) {
  playfield[row] = [];

  for (let col = 0; col < 10; col++) {
    playfield[row][col] = 0;
  }
}

// how to draw each tetromino
// @see https://tetris.fandom.com/wiki/SRS
const tetrominos = {
  'I': [
    [0,0,0,0],
    [1,1,1,1],
    [0,0,0,0],
    [0,0,0,0]
  ],
  'J': [
    [1,0,0],
    [1,1,1],
    [0,0,0],
  ],
  'L': [
    [0,0,1],
    [1,1,1],
    [0,0,0],
  ],
  'O': [
    [1,1],
    [1,1],
  ],
  'S': [
    [0,1,1],
    [1,1,0],
    [0,0,0],
  ],
  'Z': [
    [1,1,0],
    [0,1,1],
    [0,0,0],
  ],
  'T': [
    [0,1,0],
    [1,1,1],
    [0,0,0],
  ]
};

// color of each tetromino
const colors = {
  'I': 'cyan',
  'O': 'yellow',
  'T': 'purple',
  'S': 'green',
  'Z': 'red',
  'J': 'blue',
  'L': 'orange'
};

let count = 0;
let tetromino = getNextTetromino();
let rAF = null;  // keep track of the animation frame so we can cancel it
let gameOver = false;

// game loop
function loop() {
  rAF = requestAnimationFrame(loop);
  context.clearRect(0,0,canvas.width,canvas.height);

  // draw the playfield
  for (let row = 0; row < 20; row++) {
    for (let col = 0; col < 10; col++) {
      if (playfield[row][col]) {
        const name = playfield[row][col];
        context.fillStyle = colors[name];

        // drawing 1 px smaller than the grid creates a grid effect
        context.fillRect(col * grid, row * grid, grid-1, grid-1);
      }
    }
  }

  // draw the active tetromino
  if (tetromino) {

    // tetromino falls every 35 frames
    if (++count > 35) {
      tetromino.row++;
      count = 0;

      // place piece if it runs into anything
      if (!isValidMove(tetromino.matrix, tetromino.row, tetromino.col)) {
        tetromino.row--;
        placeTetromino();
      }
    }

    context.fillStyle = colors[tetromino.name];

    for (let row = 0; row < tetromino.matrix.length; row++) {
      for (let col = 0; col < tetromino.matrix[row].length; col++) {
        if (tetromino.matrix[row][col]) {

          // drawing 1 px smaller than the grid creates a grid effect
          context.fillRect((tetromino.col + col) * grid, (tetromino.row + row) * grid, grid-1, grid-1);
        }
      }
    }
  }
}

// listen to keyboard events to move the active tetromino
document.addEventListener('keydown', function(e) {
  if (gameOver) return;

  // left and right arrow keys (move)
  if (e.which === 37 || e.which === 39) {
    const col = e.which === 37
      ? tetromino.col - 1
      : tetromino.col + 1;

    if (isValidMove(tetromino.matrix, tetromino.row, col)) {
      tetromino.col = col;
    }
  }

  // up arrow key (rotate)
  if (e.which === 38) {
    const matrix = rotate(tetromino.matrix);
    if (isValidMove(matrix, tetromino.row, tetromino.col)) {
      tetromino.matrix = matrix;
    }
  }

  // down arrow key (drop)
  if(e.which === 40) {
    const row = tetromino.row + 1;

    if (!isValidMove(tetromino.matrix, row, tetromino.col)) {
      tetromino.row = row - 1;

      placeTetromino();
      return;
    }

    tetromino.row = row;
  }
});

// start the game
rAF = requestAnimationFrame(loop);
</script>

# vazdetails
# https://docs.google.com/presentation/d/1fZsqBu4t0QCSprm0GpAlK1ho2SKEqz--s6J_KM9XCr0/edit?usp=sharing


# BD
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2023 г., 22:11
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `avtovaz`
--
CREATE DATABASE IF NOT EXISTS `avtovaz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `avtovaz`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `description`, `type`) VALUES
(1, 'Лада 2110', 'Машины десятого семейства', 0),
(2, 'Оптика', 'Оптика для машин', 1),
(4, 'Салон', 'Товары для салона', 1),
(5, 'Ваз 2107', 'Машина Ваз 2107', 0),
(6, 'Оригинал', 'Оригинальная запчасть', 2),
(7, 'ВАЗ 2101', 'Машина ВАЗ 2101', 0),
(8, 'ВАЗ 2121', 'Машина ВАЗ 2121', 0),
(9, 'AMG', 'Тип фар AMG', 2),
(10, 'Стиль', 'Тип фар Стиль', 2),
(11, 'Лада 2114', 'Машина ВАЗ 2114', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id_item` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `car` int NOT NULL,
  `type` int NOT NULL,
  `podtype` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id_item`, `name`, `description`, `price`, `car`, `type`, `podtype`) VALUES
(10, 'Фара для ВАЗ 2101', 'Одна из фар для машины ВАЗ 2101', 1000, 7, 2, 6),
(11, 'Правая фара для ВАЗ 2110', 'Правая фара для 10-го семейства ВАЗ', 2500, 1, 2, 6),
(12, 'Фара для ВАЗ 2121', 'Одна из фар для ВАЗ 2121 Нива', 2500, 8, 2, 6),
(13, 'Левая фара для ВАЗ 2114', 'Левая фара для ВАЗ 2114', 2500, 11, 2, 6),
(14, 'Фара для ВАЗ 2114 AMG', 'Фара для ВАЗ 2114 в стиле AMG', 4000, 11, 2, 9),
(15, 'ПТФ для 2110', 'Двухрежимные ПТФ для десятого семейства КОМПЛЕКТ', 2500, 1, 2, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `itemsFile`
--

CREATE TABLE `itemsFile` (
  `id` int NOT NULL,
  `id_item` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `itemsFile`
--

INSERT INTO `itemsFile` (`id`, `id_item`, `name`, `path`) VALUES
(4, 9, '2101(5).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/details/'),
(5, 10, '2101(6).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/details/'),
(6, 11, '1(1).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/details/'),
(7, 12, 'vaz2121(1).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/details/'),
(8, 13, 'vaz2114(1).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/details/'),
(9, 14, 'vaz2114amg(1).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/details/'),
(10, 15, '3(1).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/details/');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `position` int NOT NULL,
  `price` int NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `phone` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `city` text COLLATE utf8mb4_general_ci NOT NULL,
  `car` int NOT NULL,
  `item` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id_review`, `name`, `description`, `city`, `car`, `item`, `timestamp`) VALUES
(6, 'Фары для 2115', 'ОТЛИЧНО', 'Тольятти', 11, 13, '2023-06-25 17:02:15');

-- --------------------------------------------------------

--
-- Структура таблицы `reviewsFile`
--

CREATE TABLE `reviewsFile` (
  `id` int NOT NULL,
  `id_review` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviewsFile`
--

INSERT INTO `reviewsFile` (`id`, `id_review`, `name`, `path`) VALUES
(1, 5, 'VAZ-2115(1)(1).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/reviews/'),
(2, 6, 'VAZ-2115(2).jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/reviews/');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name`) VALUES
(1, 'Оплачен'),
(2, 'Передан в доставку'),
(3, 'Доставлен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `firstname`, `lastname`, `admin`, `phone`) VALUES
(10, 'tigga008GT@gmail.com', '$2y$10$6J2XwXCnGh4s.hG6V70QdOMtsJxiNi0E7xtlDGYoC2Jh6SeVuoe46', 'Николай', 'Какошин', 1, '+79999999999'),
(11, 'gfhgsdrth@hdfnh.fs', '$2y$10$mUdcpb46o6B1IWvm3HD4Nut9GwuazM5OUr4pLnY0TutgBSAWc3Mx6', 'Иван', 'Иванов', 0, '+79999999999'),
(12, 'tigga008GT@Gmail.coma', '$2y$10$gf57fLNf2HHla/mIeOB4bekpwp1VU9/pClO2rYUm7JMqtbz.OkkhW', 'fsgfsgh125125', 'fdshdf2141245', 0, '+79999999999'),
(13, 'tigga008GT@Gmail.coma135', '$2y$10$qih8bvtHEFObIpZrW9LmuumwsqUbI/vylVzZqsyaLCCrRPLKdFczW', 'fsgfsgh1251235', 'fdshdf124124', 1, '+7999999999912'),
(14, NULL, '$2y$10$CJI6KIu4QltG8wFanm/05uIwlgdp29p/wuiP0oM53AZAynrXHrq/K', 'dghdtghn', 'edrtjnertdn', 0, '+79999999999'),
(16, 'sagin@gmail.com', '$2y$10$zDnm3JBFPD/6Byis7y34yOYGbvwH1GAa4jN.wsdp49GhTJsV8r9uy', 'Даниил', 'Сагин', 0, '+79021598784');

-- --------------------------------------------------------

--
-- Структура таблицы `usersAvatars`
--

CREATE TABLE `usersAvatars` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usersAvatars`
--

INSERT INTO `usersAvatars` (`id`, `id_user`, `name`, `path`) VALUES
(1, 10, '2101.jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/avatars/'),
(2, 12, '2560x1600_453290_[www.ArtFile.ru].jpg', 'D:/Programming/OSPanel/domains/vazdetails/assets/images/avatars/'),
(3, 13, 'prewiew.png', 'D:/Programming/OSPanel/domains/vazdetailsassetsimagesavatars'),
(4, 14, 'prewiew.png', 'D:/Programming/OSPanel/domains/vazdetailsassetsimagesavatars'),
(5, 15, 'prewiew.png', 'D:/Programming/OSPanel/domains/vazdetailsassetsimagesavatars'),
(6, 16, 'prewiew.png', 'D:/Programming/OSPanel/domains/vazdetailsassetsimagesavatars');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Индексы таблицы `itemsFile`
--
ALTER TABLE `itemsFile`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`);

--
-- Индексы таблицы `reviewsFile`
--
ALTER TABLE `reviewsFile`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `usersAvatars`
--
ALTER TABLE `usersAvatars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `itemsFile`
--
ALTER TABLE `itemsFile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `reviewsFile`
--
ALTER TABLE `reviewsFile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `usersAvatars`
--
ALTER TABLE `usersAvatars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
