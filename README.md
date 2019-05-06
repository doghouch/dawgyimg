# DawgyIMG (v2!)

Originally written for `i.dawgy.pw`, now open-source.

### Want to buy me a cup of coffee?

Feel free to buy me a cup of joe!

https://dawgy.pw/donate

### Any questions?

Support can be obtained by opening a request, or sending an email to `admin@dawgy.pw`.

### Prerequisites 
- a server running PHP 7 or newer
- unzip (duh!)

### Setup
Step 1 - download the repository, or clone it. 

    cd ~ 
    wget https://github.com/doghouch/dawgyimg/archive/master.zip
    
Step 2 - extract it!

    unzip master.zip
    
Step 3 - moving the files to a web directory (`/var/www/html` for most Apache systems, and `/usr/share/nginx/html` for NGINX).

    cd dawgyimg-master
    mv * /your/web/directory
    
Step 4 - set permissions for /i (where images are stored).

    chmod 755 /your/web/directory/i/
    
### Congratulations!

The script should be installed and working. Modify config.php to your needs, and the background image is replaceable by changing `background.png` in the assets folder. Happy uploading!

# Special thanks (version one)
@trewq on LET (optimization)

@Riz on LET (minor sanitation issues)