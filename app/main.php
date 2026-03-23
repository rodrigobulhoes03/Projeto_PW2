<?php

require_once 'src/interfaces/Autenticavel.php';
require_once 'src/models/Utilizador.php';
require_once 'src/models/Professor.php';
require_once 'src/models/Disciplina.php';
require_once 'src/models/Aluno.php';
require_once 'src/utils/Terminal.php';
require_once 'src/utils/Database.php';
require_once 'src/utils/Menu.php';

use src\utils\Menu;

Menu::principal();