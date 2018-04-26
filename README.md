     ______                  _____        _____ _  __
    |  ____|                |  __ \ /\   / ____| |/ /
    | |__   _ __   __ _  ___| |__) /  \ | |    |   /
    |  __| |  _ \ / _` |/ __|  ___/ /\ \| |    |  <
    | |____| | | | (_| | (__| |  / ____ \ |____|   \
    |______|_| |_|\__,_|\___|_| /_/    \_\_____|_|\_\

## Description
A site where you can download and install basics software

## How ?
Select the applications that you want to install. Then by clicking in the button [**install it**]. It will generate a shell file in the server.
then all you need to do. It's copy past the command that the next page will give in your terminal.

## Function
 - Generate installer shell script  in function of the application that has been selected
 - Check if the user is on a MacOS environment
 - Authentifaction with Tequila protocole from [ [EPFL](tequila.epfl.ch) ] ~
 - Update from a page, the json file with the template of all installer script

## OS
This will work only in MacOS

## Dependencies
 - jquery -> checkout [here](https://jquery.com/)
 - bootstrap -> checkout [here](https://getbootstrap.com/)


## Installation
     git clone https://github.com/richmartins/EnacPack.git
     cd EnacPack

 In order to make everything work you might need to give permissions to your server (e.g. Apache) to write in the folder **shell-files/** and **assets/shellCom.json**. In my case I just changed the owner of these folder to **__www**, which is the user that execute the http requests on apache server.

     sudo chown __www: shell-files/ assets/shellCom.json
