## Installation
- Install [Docker](https://docs.docker.com/engine/install/)
- Install DDEV
    - See link [DDEV](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/) for step by step instructions
- Run commands
```sh
# clone repo
git clone https://github.com/sumvee/theater-popularity-php.git

cd theater-popularity-php

# start ddev, this can take some time on first run
ddev start

# confirm installation details
ddev describe
# Node DB details from output

# to stop
ddev stop

# to restart
ddev restart

		
```
- Database preparation
    - Use DB details from output of
```sh 
ddev describe
```
- Create schema
  - Run sql/schema.sql
- Seed 
  - Run sql/seed.sql			- 

## Run application in terminal
```sh
 php ./theater-popularity.php -d=2023-11-01
 # if no theater is available for given date, 
 # command will display a list of available dates
```

