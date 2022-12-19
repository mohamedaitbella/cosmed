<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> {{__('Formulaire de contact ') ." > ". $contact->nomContact}}</title>
    <style>
        @media only screen and (max-width: 620px) {
            table.body h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }

            table.body p,
            table.body ul,
            table.body ol,
            table.body td,
            table.body span,
            table.body a {
                font-size: 16px !important;
            }

            table.body .wrapper,
            table.body .article {
                padding: 10px !important;
            }

            table.body .content {
                padding: 0 !important;
            }

            table.body .container {
                padding: 0 !important;
                width: 100% !important;
            }

            table.body .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            table.body .btn table {
                width: 100% !important;
            }

            table.body .btn a {
                width: 100% !important;
            }

            table.body .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
        }

        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }

            .btn-primary table td:hover {
                background-color: #34495e !important;
            }

            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
        }
    </style>
</head>

<body
    style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body"
        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;"
        width="100%" bgcolor="#f6f6f6">
        <tr>
            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
            <td class="container"
                style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;"
                width="580" valign="top">
                <div class="content"
                    style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">
                    <table role="presentation" class="main"
                        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;"
                        width="100%">
                        <tr>
                            <td class="wrapper"
                                style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;"
                                valign="top">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;"
                                    width="100%">
                                    <tr>
                                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;"
                                            valign="top">
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                                {{__('Message')}} :</p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                                {{ __("Un visiteur du site Nom_site, vous a envoyé le message suivant via le formulaire de contact") }}</p>
                                            
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Civilité")}} : {{ ucfirst($contact->civilite) }}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Prénom")}} :  {{ ucfirst($contact->nom) }}
                                            </p>
                                           
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Nom")}} : {{ ucfirst($contact->nom)  }}
                                            </p>
                                            <p
                                            style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                           {{__("Email")}} : {{ $contact->email }}
                                        </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Date de naissance")}} :  {{ $contact->date_naissance }}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Adresse")}} : {{ $contact->adresse }}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Code postal")}} : {{$contact->code_postal }}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Société")}} :  {{ $contact->societe}}
                                            </p>
                                            
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Ville")}} :  {{ $contact->ville}}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Pays")}} : {{ $contact->paysParser}}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Société")}} : {{ $contact->societe}}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Destinataire")}} : {{ $contact->destinataireParser}}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Message")}} : {{$contact->message}}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Inscription newsletter")}} : {{$contact->newsletterParser}}
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Date")}} : {{$contact->dateHumain }} 
                                            </p>
                                            <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                               {{__("Adresse IP")}} : {{$contact->ip_visiteur }} 
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
        </tr>
    </table>
</body>

</html>