<?php
$alt_pay_providers = array(
   'amex'                           => 'American Express',
   'discover'                       => 'Discover',
   'master'                         => 'Master Card',
   'visa'                           => 'Visa',
   'checking'                       => 'Check',
   'offline'                        => 'Offline',
   'switch'                         => 'Switch',
   'solo'                           => 'Solo',
   'maestro'                        => 'Maestro',
   'diners'                         => 'Diners',
   'hipercard'                      => 'Hipercard',
   'aura'                           => 'Aura',
   'boleto'                         => 'Boleto',
   'eft_germany'                    => 'ELV',
   'giro'                           => 'Giro',
   'paypal'                         => 'Paypal Express',
   'amazon'                         => 'Amazon Payments',
   'icepay'                         => 'Ice Pay Payments',
   'gocoin'                         => 'Go Coin',
   'bitcoin_pg'                     => 'Bitcoin PayGate',
   'boleto_banco_do_brasil'         => 'Boleto Banco do Brasil',
   'boleto_bradesco'                => 'Boleto Bradesco',
   'boleto_caixa_economica_federal' => 'Boleto Caixa Economica Federal',
   'boleto_hsbc'                    => 'Boleto HSBC',
   'boleto_itau'                    => 'Boleto Itau',
   'cielo_amex'                     => 'Cielo Amex',
   'cielo_diners'                   => 'Cielo Diners',
   'cielo_elo'                      => 'Cielo Elo',
   'cielo_mastercard'               => 'Cielo Mastercard',
   'cielo_visa'                     => 'Cielo Visa',
   'redecard_webservice_mastercard' => 'Redecard Webservice Mastercard',
   'redecard_webservice_visa'       => 'Redecard Webservice Visa'
);

$alt_pay_providers_options = '';
foreach ($alt_pay_providers as $k => $alt_pay_provider)
{
   $alt_pay_providers_options .= "<option value='{$k}'>{$alt_pay_provider}</option>";
}

$alt_pay_providers_interactive = array ('amazon','paypal','icepay');

$alt_pay_providers_interactive_options = '';

foreach ($alt_pay_providers_interactive as $alt_pay_provider)
{
   $alt_pay_providers_interactive_options .= "<option value='{$alt_pay_provider}'>{$alt_pay_provider}</option>";
}

$alt_pay_providers_interactive[] = 'gocoin';
$alt_pay_providers_interactive[] = 'bitcoin_pg';
?>
