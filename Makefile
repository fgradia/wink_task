YML = -f srcs/docker-compose.yml

all : help

help :
	@echo "usage:\nmake up - build & start app\n\
	make down - stop & clean app\nmake dops - open bash in app"

up :
	docker compose $(YML) up --build -d

down :
	docker compose $(YML) down 

dopsm :
	docker compose $(YML) exec mongo_srv bash

dopsp :
	docker compose $(YML) exec php8_srv bash
