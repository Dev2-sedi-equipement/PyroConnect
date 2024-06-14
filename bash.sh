#!/bin/bash

db_name="*****"
db_user="*****"
db_pass="*****"

echo "$(date)"
echo "Récupération et conversion des fichiers mdb en csv ..."

cd /home/ftp-adic/test
cp adic-2006.mdb /home/adic/
cd /home/adic/

mdb-export adic-2006.mdb Clients > Client.csv
mdb-export adic-2006.mdb Produits > Produit.csv
mdb-export adic-2006.mdb client_produit > Client_Produit.csv

mv Client.csv ./process
mv Produit.csv ./process
mv Client_Produit.csv ./process
cd ./process

echo "Filtrage des tables ..."

csvsql --query "select client_pass from Client where client_adic = 1;" Client.csv > users_pass.csv
csvsql --query "select client_id, client_nom, client_codepostal, client_email, client_insee from Client where client_adic = 1 ;" Client.csv > users.csv
csvsql --query "select prod_id, prod_nom, prod_ref from Produit;" Produit.csv > products.csv
#csvsql --query "select client_insee, prod_ref from client_produit;" client_produit.csv > products_users.csv

echo "Phase d'encryptage (10 à 15 minutes)"

php bcrypt.php

echo "Fusion mdp >< users ..."

paste -d, users.csv result.csv > fusers.csv

echo "I.L.T.M.I.M.I ..."

mv fusers.csv ./..
mv products.csv ./..
cp Client_Produit.csv ./..
cd ./..

echo "Réécriture des noms de colonnes ..."

sed -i '1s/client_insee/code_insee/' Client_Produit.csv
sed -i 's/$/,"0"/' Client_Produit.csv
sed -i '1s/0/id/' Client_Produit.csv
sed -i '1s/client_id/id/' fusers.csv
sed -i '1s/client_insee/code_insee/' fusers.csv
sed -i '1s/client_nom/name/' fusers.csv
sed -i '1s/client_email/email/' fusers.csv
sed -i '1s/client_codepostal/adresse_postale/' fusers.csv
sed -i '1s/prod_id/id/' products.csv

echo "Réagencement des colonnes ..."

awk -F, '{print $1,$5,$2,$4,$3,$6}' FS=, OFS=, fusers.csv > users.csv
awk -F, '{print $3, $1, $2}' FS=, OFS=, Client_Produit.csv > products_users.csv

rm fusers.csv
rm Client_Produit.csv

echo "Mise à jour de la bdd ..."

mysql -u $db_user -p$db_pass -D $db_name -e "LOAD DATA LOCAL INFILE '/home/adic/products.csv' IGNORE INTO TABLE products FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 ROWS;"
mysql -u $db_user -p$db_pass -D $db_name -e "LOAD DATA LOCAL INFILE '/home/adic/users.csv' IGNORE INTO TABLE users FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 ROWS;"
mysql -u $db_user -p$db_pass -D $db_name -e "SET FOREIGN_KEY_CHECKS = 0;"
mysql -u $db_user -p$db_pass -D $db_name -e "TRUNCATE TABLE products_users;"
mysql -u $db_user -p$db_pass -D $db_name -e "LOAD DATA LOCAL INFILE '/home/adic/products_users.csv' IGNORE INTO TABLE products_users FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 ROWS;"
mysql -u $db_user -p$db_pass -D $db_name -e "SET FOREIGN_KEY_CHECKS = 1;"

echo "<====================Mise à jour terminée====================>"
echo "$(date)"

exit