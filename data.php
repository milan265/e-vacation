<?php
    $jsonUsers = '
        [
            {
                "id": 1,
                "email": "admin@mail.rs",
                "password": "admin",
                "userType": "admin",
                "name": "Admin",
                "surname": "Admin",
                "position": "",
                "contractType": "",
                "employmentDate": ""
            },
            {
                "id": 2,
                "email": "pera@mail.rs",
                "password": "1234",
                "userType": "employee",
                "name": "Pera",
                "surname": "Peric",
                "position": "Back-end developer",
                "contractType": "stalno",
                "employmentDate": "2019-05-01"
            },
            {
                "id": 3,
                "email": "mika@mail.rs",
                "password": "1234",
                "userType": "employee",
                "name": "Mika",
                "surname": "Jovanovic",
                "position": "Back-end developer",
                "contractType": "stalno",
                "employmentDate": "2020-02-13"
            },
            {
                "id": 4,
                "email": "mara@mail.rs",
                "password": "1234",
                "userType": "employee",
                "name": "Mara",
                "surname": "Pekic",
                "position": "Front-end developer",
                "contractType": "odredjeno",
                "employmentDate": "2020-10-07"
            },
            {
                "id": 5,
                "email": "zora@mail.rs",
                "password": "1234",
                "userType": "employee",
                "name": "Zora",
                "surname": "Zoric",
                "position": "Marketing",
                "contractType": "stalno",
                "employmentDate": "2020-09-22"
            }
        ]
    ';

    $jsonRequest = '
        [
            {
                "id": 1,
                "numOfDays": 5,
                "from": "2020-01-05",
                "to": "2020-01-11",
                "userId": 2,
                "status": "neaktivan",
                "comment": "",
                "accepted": true
            }
        ]
    ';

    $arrUsers = json_decode($jsonUsers);
    $arrRequest = json_decode($jsonRequest);

?>