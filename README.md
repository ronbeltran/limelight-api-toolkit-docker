## Dockerized Limelight API  Toolkit

https://help.limelightcrm.com/hc/en-us/articles/212809566-Transaction-API-Documentation
https://help.limelightcrm.com/hc/en-us/articles/212809546-API-Toolkit

Intructions:

    docker pull ubuntu:16.04
    docker build -t limelight-api-toolkit .
    docker run -p 8080:80 -d limelight-api-toolkit

Or run interatively:

    docker run -it limelight-api-toolkit /bin/bash
    apache2ctl start

Then open http://localhost:8080/limelightapitester.php
