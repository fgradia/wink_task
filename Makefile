YML = -f srcs/docker-compose.yml

all : help

help :
	@echo "usage:\nmake up - build & start app\n\
	make down - stop & clean app\n\
	make dopsm - open bash in mongo_srv\n\
	make dopsp - open bash in php_srv\n\
	make clean - down + clean imgs\n\
	make fclean - clean + rm database"

up : down
	docker compose $(YML) up --build -d

down :
	docker compose $(YML) down -v

dopsm :
	docker compose $(YML) exec mongo_srv bash

dopsp :
	docker compose $(YML) exec php_srv bash

clean : down
	docker rmi php_img mongo_img

fclean : clean
	rm -rf srcs/mongo/data/*
	docker builder prune -f

PHONY : all help up down dopsm dopsp clean fclean

