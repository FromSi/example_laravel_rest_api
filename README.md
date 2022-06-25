## Пет-проект
Создал этот пет проект для того, чтобы освоить для себя новое. Проект чат.

## Нужно обязательно иметь
- Docker (v20+)
- Docker-Compose (v1.29+)
- GNU Make (v3+)

## Желательно иметь свободные порты
Если порт занят, можно изменить порты в `docker/docker-compose.override.yml` и `.env` после команды `make install`.
- 80
- 443
- 5432
- 8080

## Xdebug для PhpStorm
В `PhpStorm > Preferences > Servers > +`
- В Name нужно записать `chat`
- В Host нужно записать `localhost`
- Найти в `Project files` директорию проекта и прописать этой директории `/var/www`
