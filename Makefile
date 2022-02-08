YML = -f srcs/docker-compose.yml
NULL = 
CNT_RM := $(shell sudo docker ps -aq)
IMG_RM := $(shell sudo docker images -q)

all : help

help :
	@echo "usage:\nmake up - build & start app\n\
	make down - stop & clean app\n\
	make dopsm - open bash in mongo_srv\n\
	make dopsp - open bash in php_srv\n\
	make cclean - down + clean ALL docker containers\n\
	make iclean - cclean + clean ALL docker images\n\
	make fclean - iclean + rm mongo_database + clean ALL docker data\n\
	make docker - run file docker_install.sh to install docker on linux\n"

docker:
	bash docker_install.sh 2> /dev/null

up : down
	docker compose $(YML) up --build -d

down :
	docker compose $(YML) down -v

dopsm :
	docker compose $(YML) exec mongo_srv bash

dopsp :
	docker compose $(YML) exec php_srv bash

cclean : down
ifneq ($(CNT_RM), $(NULL))
	sudo docker rm -f $(CNT_RM);
endif

iclean : cclean
ifneq ($(IMG_RM), $(NULL))
	sudo docker rmi -f $(IMG_RM);
endif

fclean : iclean
	rm -rf /mongo_db
	docker system prune -f

PHONY : all help docker up down dopsm dopsp cclean iclean fclean

