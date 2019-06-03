import os
import fileinput
import requests
from bs4 import BeautifulSoup
import re
import urllib.request, json
import mysql.connector
from ftplib import FTP
from datetime import datetime

FTP_ADDRESS = "2.137.103.114"
FTP_USERNAME = "GEG"
FTP_PASSWORD = "azsxdc1"


class Game(object):

    def __init__(self, id, name,price,description,synopsis,image):
        self.id = id
        self.name = name
        self.price = price
        self.description = description
        self.synopsis = synopsis
        self.image = image
        self.publisherID = 4
        self.logo = "default_icon.png"

    def uploadImage(self):
        imgfilename = "temporary.jpg"
        with open("temp/" + imgfilename,'wb') as f:
            f.write(urllib.request.urlopen(self.image).read())

        ftp = FTP()
        ftp.connect(FTP_ADDRESS, 21)
        ftp.login(FTP_USERNAME, FTP_PASSWORD)
        fp = open("temp/temporary.jpg", 'rb')
        ftp.storbinary('STOR image_' + str(self.id) +'.jpg', fp, 1024)
        fp.close()


class Scrapper:

    def scrap(self):
        # https://store.steampowered.com/search/?term=
        base_URL = "https://store.steampowered.com/search/?term="
        page = requests.get(base_URL, headers={'User-Agent': 'Mozilla/5.0'})
        page = page.content.decode('utf-8')
        soup = BeautifulSoup(page, 'html.parser')

        page_results = soup.find_all("a", class_="search_result_row")

        gameURLs = []

        for result in page_results:
            # print(str(result))
            appURL = re.search(r'href=".*?"',str(result))
            if appURL is not None:
                appURL = appURL.group()[6:-1]
                gameURLs.append(appURL)


        DB_ID= 100

        gamesToUpload = []

        for URL in gameURLs:
            html = requests.get(URL, headers={'User-Agent': 'Mozilla/5.0'})
            html = html.content.decode('utf-8')
            soup = BeautifulSoup(html, 'html.parser')

            appName = soup.find("div", class_="apphub_AppName")
            appName =  re.search(r'>.*?</div>', str(appName))
            if appName is not None:
                appName = str(appName.group()[1:-6])
                print(appName)

            imageURL = re.search(r'class="game_header_image_full" src=".*?"', str(html))
            if imageURL is not None:
                imageURL = imageURL.group()[:-1]
                imageURL = str(imageURL.replace('class="game_header_image_full" src="',""))
                print(imageURL)

            appPrice = soup.find("div", class_="game_purchase_price")
            appPrice = "".join(str(appPrice).split())
            appPrice = re.search(r'>.*?<',str(appPrice))
            if appPrice is not None:
                if "FreetoPlay" in str(appPrice):
                    appPrice = 0.00
                else:
                    appPrice = appPrice.group()[1:-1]
                    appPrice = appPrice.replace('€',"")
                    appPrice = str(appPrice.replace(',', "."))
                print(appPrice)

            appSynopsis = soup.find("div", class_="game_description_snippet")
            appSynopsis = str(appSynopsis).replace("\t","")
            appSynopsis = appSynopsis.replace("\n", "")
            appSynopsis = re.search(r'>.*?<', str(appSynopsis))

            if appSynopsis is not None:
                appSynopsis = str(appSynopsis.group()[1:-1])
                print(appSynopsis)

            appDescription = soup.find("div", class_="game_area_description")
            appDescription = str(appDescription).replace("\t", "")
            appDescription = str(appDescription).replace("<h2>About This Game</h2>", "")
            appDescription = str(appDescription).replace("<br>\n<br>", "\n")
            appDescription = str(appDescription).replace("</br>", "")
            appDescription = str(appDescription).replace("</div>", "")
            appDescription = re.sub(r'<div.*?>',"",appDescription)
            appDescription = str(re.sub(r'<.*?>', "", appDescription))
            print(appDescription)
            print('\n\n')

            if (appDescription is not None and
                appSynopsis is not None and
                appPrice is not None and
                imageURL is not None and
                appName is not None):

                game = Game(DB_ID,appName,appPrice,appDescription,appSynopsis,imageURL)
                gamesToUpload.append(game)
                DB_ID += 1

        self.connection = mysql.connector.connect(host="localhost", port="3306", database="goldenexperience", user="root",
                                                  password="", use_pure=True)
        self.cursor = self.connection.cursor()
        print(len(gamesToUpload))

        for game in gamesToUpload:
            self.uploadGame(game)

        self.connection.close()


    def uploadGame(self,game):
        game.uploadImage()
        query = """INSERT INTO games (id,created_at,updated_at,name,price,description,synopsis,icon_url,image_url,publisher_id) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"""
        data= (game.id,(str(datetime.now())).split('.')[0], (str(datetime.now())).split('.')[0], game.name,game.price,game.description,game.synopsis,game.logo,game.image,game.publisherID)
        self.cursor.execute(query, data)
        self.connection.commit()


if __name__ == "__main__":
    Scrapper().scrap()