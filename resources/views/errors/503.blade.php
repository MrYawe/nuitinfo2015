<!DOCTYPE html>
<html>
    <head>
        <style>
            .space {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background: #435d70;
              overflow: hidden;
            }
            .space .mars {
              position: absolute;
              top: 50%;
              left: 50%;
              z-index: 2;
            }
            .space .mars .tentacle {
              position: absolute;
              top: -60px;
              right: -80px;
              z-index: 1;
              height: 70px;
              width: 70px;
              box-sizing: border-box;
              border-radius: 100%;
              border-left: 15px solid #1aae1e;
              -webkit-transform: rotate(-30deg);
                  -ms-transform: rotate(-30deg);
                      transform: rotate(-30deg);
              -webkit-animation: tentacle 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
                      animation: tentacle 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
            }
            .space .mars .flag {
              position: absolute;
              height: 17px;
              width: 15px;
              top: -57px;
              left: -1px;
              -webkit-animation: flag-pole 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
                      animation: flag-pole 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
            }
            .space .mars .flag:before {
              content: "";
              position: absolute;
              height: 17px;
              width: 2px;
              background: #eee;
            }
            .space .mars .flag:after {
              content: "";
              position: absolute;
              height: 10px;
              width: 14px;
              left: 2px;
              top: 0;
              background: #aaa;
              -webkit-animation: flag-unfurl 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
                      animation: flag-unfurl 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
            }
            .space .mars .flag .small-tentacle {
              position: absolute;
              left: -16px;
              top: 3px;
              height: 50px;
              width: 50px;
              border-left: 10px solid #1aae1e;
              border-radius: 100%;
              -webkit-transform: rotate(25deg);
                  -ms-transform: rotate(25deg);
                      transform: rotate(25deg);
              -webkit-animation: small-tentacle 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
                      animation: small-tentacle 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
              z-index: 2;
            }
            .space .mars:before {
              content: "";
              position: absolute;
              top: 80px;
              left: -30px;
              height: 10px;
              width: 60px;
              background: rgba(0, 0, 0, 0.2);
              background: #374d5c;
              border-radius: 100%;
            }
            .space .mars .planet {
              box-sizing: border-box;
              position: absolute;
              border-radius: 100%;
              height: 120px;
              width: 120px;
              overflow: hidden;
              margin-left: -60px;
              margin-top: -60px;
              z-index: 2;
            }
            .space .mars .planet .surface {
              position: absolute;
              border-radius: 100%;
              height: 140%;
              width: 140%;
              top: -30%;
              right: -10%;
              box-sizing: border-box;
              border: 30px solid rgba(0, 0, 0, 0.15);
              background: #ff5f40;
            }
            .space .mars .planet .crater1,
            .space .mars .planet .crater2,
            .space .mars .planet .crater3 {
              position: absolute;
              border-radius: 100%;
              background: rgba(0, 0, 0, 0.15);
              box-shadow: inset 3px 3px 0 rgba(0, 0, 0, 0.2);
            }
            .space .mars .planet .crater1 {
              height: 20px;
              width: 20px;
              top: 32%;
              left: 17%;
            }
            .space .mars .planet .crater2 {
              height: 10px;
              width: 10px;
              top: 26%;
              left: 55%;
              box-shadow: inset 2px 2px 0 rgba(0, 0, 0, 0.2);
            }
            .space .mars .planet .crater3 {
              height: 10px;
              width: 10px;
              top: 60%;
              left: 40%;
              box-shadow: inset 2px 2px 0 rgba(0, 0, 0, 0.2);
            }
            .space .ship {
              position: absolute;
              right: 50%;
              top: 50%;
              margin-top: -55px;
              margin-right: -55px;
              height: 22px;
              background: rgba(0, 0, 0, 0.1);
              -webkit-transform-origin: 0% 100% 0;
                  -ms-transform-origin: 0% 100% 0;
                      transform-origin: 0% 100% 0;
              z-index: 1;
              -webkit-animation: ship 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
                      animation: ship 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
            }
            .space .ship .ship-rotate {
              position: absolute;
              height: 22px;
              -webkit-transform: rotate(-110deg);
                  -ms-transform: rotate(-110deg);
                      transform: rotate(-110deg);
              -webkit-animation: ship-rotate 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
                      animation: ship-rotate 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
            }
            .space .ship .pod {
              position: absolute;
              top: 0;
              left: -8px;
              height: 16px;
              width: 16px;
              background: #eee;
              border-radius: 100% 0 100% 0;
              -webkit-transform: rotate(-45deg);
                  -ms-transform: rotate(-45deg);
                      transform: rotate(-45deg);
            }
            .space .ship .fuselage {
              position: absolute;
              top: 14px;
              left: -6px;
              height: 8px;
              width: 12px;
              background: #eee;
              border-radius: 100% 100% 0 0;
            }
            .space .ship .fuselage:after {
              content: "";
              position: absolute;
              left: 2px;
              top: 100%;
              width: 0;
              height: 0;
              border-left: 4px solid transparent;
              border-right: 4px solid transparent;
              border-top: 6px solid red;
            }
            .space .ship-shadow {
              position: absolute;
              right: 10%;
              top: 50%;
              margin-right: -28px;
              margin-top: 83px;
              height: 4px;
              width: 16px;
              background: #374d5c;
              border-radius: 100%;
              -webkit-animation: ship-shadow 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
                      animation: ship-shadow 12s cubic-bezier(0.645, 0.045, 0.355, 1) infinite;
            }

            @-webkit-keyframes small-tentacle {
              0% {
                -webkit-transform: rotate(-60deg);
                        transform: rotate(-60deg);
              }
              86% {
                -webkit-transform: rotate(-60deg);
                        transform: rotate(-60deg);
              }
              89% {
                -webkit-transform: rotate(10deg);
                        transform: rotate(10deg);
              }
              100% {
                -webkit-transform: rotate(10deg);
                        transform: rotate(10deg);
              }
            }

            @keyframes small-tentacle {
              0% {
                -webkit-transform: rotate(-60deg);
                        transform: rotate(-60deg);
              }
              86% {
                -webkit-transform: rotate(-60deg);
                        transform: rotate(-60deg);
              }
              89% {
                -webkit-transform: rotate(10deg);
                        transform: rotate(10deg);
              }
              100% {
                -webkit-transform: rotate(10deg);
                        transform: rotate(10deg);
              }
            }
            @-webkit-keyframes tentacle {
              0% {
                -webkit-transform: rotate(-30deg);
                        transform: rotate(-30deg);
              }
              75% {
                -webkit-transform: rotate(-30deg);
                        transform: rotate(-30deg);
              }
              80% {
                -webkit-transform: rotate(-165deg) translate(6px, 8px);
                        transform: rotate(-165deg) translate(6px, 8px);
              }
              82.5% {
                -webkit-transform: rotate(-165deg) translate(28px, -17px);
                        transform: rotate(-165deg) translate(28px, -17px);
              }
              100% {
                -webkit-transform: rotate(-165deg) translate(35px, -22px);
                        transform: rotate(-165deg) translate(35px, -22px);
              }
            }
            @keyframes tentacle {
              0% {
                -webkit-transform: rotate(-30deg);
                        transform: rotate(-30deg);
              }
              75% {
                -webkit-transform: rotate(-30deg);
                        transform: rotate(-30deg);
              }
              80% {
                -webkit-transform: rotate(-165deg) translate(6px, 8px);
                        transform: rotate(-165deg) translate(6px, 8px);
              }
              82.5% {
                -webkit-transform: rotate(-165deg) translate(28px, -17px);
                        transform: rotate(-165deg) translate(28px, -17px);
              }
              100% {
                -webkit-transform: rotate(-165deg) translate(35px, -22px);
                        transform: rotate(-165deg) translate(35px, -22px);
              }
            }
            @-webkit-keyframes ship {
              0% {
                right: -10%;
                top: -10%;
                margin-top: -55px;
                margin-right: -55px;
              }
              40% {
                right: 50%;
                top: 50%;
              }
              79.5% {
                margin-top: -55px;
                margin-right: -55px;
              }
              84% {
                margin-top: -20px;
                margin-right: 0px;
              }
              100% {
                right: 50%;
                top: 50%;
                margin-top: 0px;
                margin-right: 0px;
              }
            }
            @keyframes ship {
              0% {
                right: -10%;
                top: -10%;
                margin-top: -55px;
                margin-right: -55px;
              }
              40% {
                right: 50%;
                top: 50%;
              }
              79.5% {
                margin-top: -55px;
                margin-right: -55px;
              }
              84% {
                margin-top: -20px;
                margin-right: 0px;
              }
              100% {
                right: 50%;
                top: 50%;
                margin-top: 0px;
                margin-right: 0px;
              }
            }
            @-webkit-keyframes ship-rotate {
              0% {
                -webkit-transform: rotate(-110deg);
                        transform: rotate(-110deg);
              }
              20% {
                -webkit-transform: rotate(-110deg);
                        transform: rotate(-110deg);
              }
              34% {
                -webkit-transform: rotate(47deg);
                        transform: rotate(47deg);
              }
              79% {
                -webkit-transform: rotate(47deg);
                        transform: rotate(47deg);
              }
              100% {
                -webkit-transform: rotate(47deg);
                        transform: rotate(47deg);
              }
            }
            @keyframes ship-rotate {
              0% {
                -webkit-transform: rotate(-110deg);
                        transform: rotate(-110deg);
              }
              20% {
                -webkit-transform: rotate(-110deg);
                        transform: rotate(-110deg);
              }
              34% {
                -webkit-transform: rotate(47deg);
                        transform: rotate(47deg);
              }
              79% {
                -webkit-transform: rotate(47deg);
                        transform: rotate(47deg);
              }
              100% {
                -webkit-transform: rotate(47deg);
                        transform: rotate(47deg);
              }
            }
            @-webkit-keyframes ship-shadow {
              0% {
                right: -10%;
                -webkit-transform: scale(1.4, 1);
                        transform: scale(1.4, 1);
                opacity: .3;
              }
              40% {
                right: 50%;
                -webkit-transform: scale(0.75, 1);
                        transform: scale(0.75, 1);
                opacity: 1;
              }
              100% {
                right: 50%;
              }
            }
            @keyframes ship-shadow {
              0% {
                right: -10%;
                -webkit-transform: scale(1.4, 1);
                        transform: scale(1.4, 1);
                opacity: .3;
              }
              40% {
                right: 50%;
                -webkit-transform: scale(0.75, 1);
                        transform: scale(0.75, 1);
                opacity: 1;
              }
              100% {
                right: 50%;
              }
            }
            @-webkit-keyframes planet-bump {
              0% {
                margin-left: 0;
              }
              39% {
                margin-left: 0;
              }
              40% {
                margin-left: -1px;
              }
              40.5% {
                margin-left: 1px;
              }
              41% {
                margin-left: 0;
              }
              100% {
                margin-left: 0;
              }
            }
            @keyframes planet-bump {
              0% {
                margin-left: 0;
              }
              39% {
                margin-left: 0;
              }
              40% {
                margin-left: -1px;
              }
              40.5% {
                margin-left: 1px;
              }
              41% {
                margin-left: 0;
              }
              100% {
                margin-left: 0;
              }
            }
            @-webkit-keyframes flag-pole {
              0% {
                top: -57px;
              }
              48% {
                top: -57px;
              }
              54% {
                top: -77px;
              }
              90% {
                top: -77px;
              }
              92% {
                top: -57px;
              }
              100% {
                top: -57px;
              }
            }
            @keyframes flag-pole {
              0% {
                top: -57px;
              }
              48% {
                top: -57px;
              }
              54% {
                top: -77px;
              }
              90% {
                top: -77px;
              }
              92% {
                top: -57px;
              }
              100% {
                top: -57px;
              }
            }
            @-webkit-keyframes flag-unfurl {
              0% {
                width: 0;
              }
              55% {
                width: 0;
              }
              60% {
                width: 14px;
              }
              90% {
                width: 14px;
              }
              100% {
                width: 14px;
              }
            }
            @keyframes flag-unfurl {
              0% {
                width: 0;
              }
              55% {
                width: 0;
              }
              60% {
                width: 14px;
              }
              90% {
                width: 14px;
              }
              100% {
                width: 14px;
              }
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .super-title {
                font-weight: 100;
                font-size: 90px;
                margin-bottom: 40px;
                position: absolute;
                top: 20%;  /* position the top  edge of the element at the middle of the parent */
                left: 51%; /* position the left edge of the element at the middle of the parent */

                transform: translate(-50%, -50%); /* This is a shorthand of */
            }

            .title {
                font-weight: 100;
                font-size: 72px;
                margin-bottom: 40px;
                position: absolute;
                top: 70%;  /* position the top  edge of the element at the middle of the parent */
                left: 51%; /* position the left edge of the element at the middle of the parent */

                transform: translate(-50%, -50%); /* This is a shorthand of */
            }

        </style>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,100" rel="stylesheet" type="text/css">
    </head>
    <body>
      <div class="space">

        <div class="container">
            <div class="content">
                <div class="super-title">HTAG - Nuit de l'info</div>
                <div class="title">Be right back.</div>
            </div>
        </div>

        <div class="ship">
          <div class="ship-rotate">
            <div class="pod"></div>
            <div class="fuselage"></div>
          </div>
        </div>
        <div class="ship-shadow"></div>
        <div class="mars">
          <div class="tentacle"></div>
          <div class="flag">
            <div class="small-tentacle"></div>
          </div>
          <div class="planet">
            <div class="surface"></div>
            <div class="crater1"></div>
            <div class="crater2"></div>
            <div class="crater3"></div>
          </div>
        </div>
        <div class="test"></div>
      </div>
    </body>
</html>