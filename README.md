Voting System Application

# How to use

## Prerequisite - PHP version (8.1 - 8.3 preferably)

1. Clone the repository into your working environment

2. `git clone https://github.com/IlijaAngelov/pabau_app.git`

3. Change directory to FileScanner `cd pabau_app`

4. Open the project in your favourite IDE

5. Configure the Database. I used MySQL, but you can you any other similar RDB. For this project I have created 3 tables. Users, Categories and Votes.

6. Run `composer install`

7. Run `php -S localhost:9000 -t public` ( if you have installed Apache or NGINX , otherwise run these 2 commands if you are on Linux )
   `sudo apt update`
   `sudo apt install apache2`

Note: Make sure project runs In the background
(Entry point: http://127.0.0.1:9000/ )

Key Features

https://127.0.0.1:9000/vote - to make the Vote for the favourite colleague
https://127.0.0.1:9000/winners - to see which colleague won the specific category and see which colleague voted the most.
