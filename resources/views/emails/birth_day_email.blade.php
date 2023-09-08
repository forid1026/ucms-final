<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Birthday Card Reveal</title>
    <style type="text/css">
        @media screen and (-webkit-min-device-pixel-ratio:0) {
            .tap {
                display: block !important;
                mso-hide: all !important;
            }

            .reveal {
                display: none
            }

            #tapreveal:checked~* .reveal {
                display: block !important;
            }

            #tapreveal:checked~* .tap {
                display: none !important;
            }
        }

        @media screen and (max-device-width:640px),
        screen and (max-width:640px) {
            .w100pc {
                width: 100% !important;
                min-width: 100% !important;
                max-width: 1000px !important;
                height: auto !important;
            }
        }
    </style>
</head>

<body style="margin:0px; padding:0px;">
    <!--[if mso]><!-->
    <input type="radio" name="tapreveal" id="tapreveal"
        style="mso-hide:all; display:none!important; height:0px; max-height:0px; overflow:hidden; font-size:0; margin-left:-10000px;">
    <!--<![endif]-->

    <table width="100%" role="presentation" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td align="center" valign="top">

                <!-- Click Reveal -->
                <table role="presentation" width="450" style="width:450px;" cellpadding="0" cellspacing="0"
                    border="0" align="center" class="w100pc" bgcolor="#FF6600">
                    <tr>
                        <td align="center" valign="top" style="padding: 20px 0;">

                            <!-- Main offer/fallback -->
                            <table class="reveal w100pc" width="450" border="0" cellspacing="0" cellpadding="0"
                                style="width:450px;" align="center">
                                <tr>
                                    <td align="left"
                                        style="padding:20px 40px 20px 40px;font-family: Arial, sans-serif;  font-size:18px; line-height:24px; color:#ffffff;">
                                        Dear Student,</td>
                                </tr>
                                <tr>
                                    <td align="center"
                                        style="font-family: Arial, sans-serif; font-size:18px; line-height:24px; color:#ffffff; text-align: center;">
                                        Happy Birthday from UCMS.</td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 20px"><img
                                            src="https://arcdn.net/ActionRocket/Blog-article/click-to-reveal/images/Unicorn-bday.png"
                                            width="350" height="auto"
                                            style="display:block;width:350px; height: auto;" alt="Unicorn Dab!"
                                            border="0" class="w100pc"></td>
                                </tr>
                            </table>

                            <!-- Interactive/tap/Reveal section -->

                            <!--[if mso|IE]><!-->
                            <table class="tap" width="100%" border="0" cellspacing="0" cellpadding="0"
                                style="mso-hide:all; display:none" align="center">
                                <tr style="mso-hide:all">
                                    <td align="center" style="mso-hide:all">
                                        <!-- input -->
                                        <label id="tapreveal" for="tapreveal"><img class="w100pc"
                                                style="display:block; mso-hide:all; height: auto;" border="0"
                                                src="https://arcdn.net/ActionRocket/Blog-article/click-to-reveal/images/Happy-Birthday-front.png"
                                                width="450" style="width:450px" alt="Happy Birthday"> </label>
                                    </td>
                                </tr>
                            </table>
                            <!--<![endif]-->
                        </td>
                    </tr>
                </table>

                <!-- / Click Reveal -->
            </td>
        </tr>
    </table>
</body>

</html>
