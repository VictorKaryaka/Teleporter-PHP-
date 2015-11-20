# Task:

In the universe there is a family - father, mother, daughter and son, who wanted to see the future.
One day, they met his old friend who has a time machine. However, the family was faced with a problem, a time machine can move in time only one adult or two children and at the same time machine must be returned to the owner.
How whole family get there into the future and get a time machine owner?

# Requirements:

- The task is necessary to solve by using php 5 and OOP;
- The program should read the configuration from the yaml / json / ini / php or database;
- Must be able to change the number of adults or children;
- The program should write log to the database or file:
- if the log output in the database, that the logs should be the number of iterations and the final runtime apps;
- if log output to a file that should be the number of iterations, and the sequence information of movement of people in time.

# Running the application:

- Configure settings in "db_config.ini" for connecting to the database (MySQL v.5.1+);
- Configure the number of participants in "persons.ini" or use default;
- Run "run.php";
- Check the application log in the database;
