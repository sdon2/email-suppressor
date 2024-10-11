**<p style="text-align:center;"><ins>EMAIL SUPPRESSOR FOR EMPOWERMAIL</ins></p>**

This project is developed as a email suppressing tool which has to be
used in the mail campaigning tool **"EmpowerMail"**.

**Requirements:**

- PHP 8.3

- MySQL (With source data preloaded)

- PDO MySQL driver installed in PHP

- Composer installed

- Nodejs installed (Optional)

Clone or Download package from github:
<https://github.com/sdon2/email-suppressor>

To clone use git command: "git clone
<https://github.com/sdon2/email-suppressor.git>"

**Installation:**

1.  Install composer dependencies using "npm run install" (With node
    installed) or "composer install" (Without node)

2.  Create empower_mail database in MySQL and load data inside "data"
    table.

3.  Run project using "npm run serve" (With node installed) or "php --S
    localhost:8000 --t ." (Without node)

**Design:**

The design model utilizes few SOLID principles namely Single
Responsibility Principle, Interface Segregation Principle and Dependency
Inversion Principle.

Create interface to make all the suppressors callable from iteration.

Make an abstract class to store counts and common functions. Extend this
class and make individual suppressors.

Suppressor classes process method will read the file line by line and
check against database.

First the email's to be suppressed will be collected and their common
data format and similarities has been identified.

We have to check the items need to be suppressed with actual data in the
database.

*IdSuppressor:*

1.  Suppress data will be in md5 format of field email

2.  Create a suppress method that checks for md5 of email data with file
    data.

3.  If md5 of email is found, it'll be counted as item to be suppressed.

*UnsubscribedSuppressor:*

1.  Suppress data will be in format of emid and offerID concatenated
    with a pipe symbol - \|

2.  Explode (Split) the data and get emid

3.  Create a suppress method that checks for emid with file data.

4.  If emid is found, it'll be counted as item to be suppressed.

*OptOutSuppressor:*

1.  Suppress data will be in format of emid and offerID concatenated
    with a pipe symbol - \|

2.  Explode (Split) the data and get emid

3.  Create a suppress method that checks for emid with file data.

4.  If emid is found, it'll be counted as item to be suppressed.

*Bad MailSuppressor:*

1.  The constructor is used to identify the file used for bad email
    suppression.

2.  Suppress data will be in format of email

3.  Create a suppress method that checks for email with file data.

4.  If email is found, it'll be counted as item to be suppressed.
