# 🏆 Placar Arena

Sistema de controle e exibição de placares ao vivo para arenas esportivas, desenvolvido com Laravel 12 + AdminLTE + Chart.js.

## Funcionalidades
- Cadastro de modalidades, equipes, jogadores e partidas
- Controle de placar ao vivo pelo administrador
- Atualização automática da tela pública sem precisar de refresh
- Dashboard administrativo com gráficos dinâmicos

## Tecnologias
- Laravel 12.x
- Bootstrap 5
- AdminLTE
- Chart.js
- MySQL

## Instalação local
```bash
git clone https://github.com/wesleyabreeuu/placar-arena.git
cd placar-arena
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
