#Requirements:

1. PHP 7
2. Mysql
3. Composer


#Installation instructions

1. clone ao_test repo:
    git clone https://github.com/patricksCode/at_test.git
    
2. Create database in mysql called ao_test.

3. From here run all commands from root of local install of ao_test.
   
4. Run 'composer install'.

5. Run 'chmod -R 777 storage' directory in repo.

6. Run 'php artisan migrate'.

7. Run 'php artisan db:seed'.

8. Navigate to site rom web browers and enjoy 

#Testing

There are 5 test user accounts.

     user1@gmail.com
     user2@gmail.com
     user3@gmail.com
     user4@gmail.com
     user5@gmail.com
    
The password for all accounts are 'abc123'.

There are 4 behavioral multiple choice questions.  Each user can
answer each question once a day.  You can also change the answers to
questions during same day.

Once you finish answering the questions, click see results at the bottom
of the page to see answer results.