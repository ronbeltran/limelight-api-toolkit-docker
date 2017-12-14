var ll = jQuery.noConflict();

function ToggleActions(obj)
{
   if (obj.value != '')
   {
      ll('.test_form').hide();
      ll('#' + obj.value).show();
      ll('#' + obj.value + 'password').val(ll('#password').val());
      ll('#' + obj.value + 'username').val(ll('#username').val());
      ll('#' + obj.value + '_site').val(ll('#site').val());
   }
}

function UpdateAttributes(parent)
{
   var prod_id = '',
       attr_vals = {},
       opt_vals  = {},
       all_attrs = '';

   ll('.prod-attr').each(function()
   {
      prod_id            = ll(this).attr('name').replace(/[^0-9]+/, '');
      attr_vals[prod_id] = ll(this).val();
      opt_vals[prod_id]  = ll("input[name='prod_opt_" + prod_id + "']").val();
   });

   ll.each(attr_vals, function (prod_id, vals)
   {
      var values   = vals.split(',');
      var num_vals = values.length;
      var opts     = opt_vals[prod_id].split(',');

      for (i = 0; i < num_vals; i++)
      {
         the_attr = values[i];
         the_opt  = opts[i];

         if (typeof(the_attr) != 'undefined' && the_attr != '' && typeof(the_opt) != 'undefined' && the_opt != '')
         {
            all_attrs += '<input type="hidden" name="product_attribute['+prod_id+'][' + the_attr + ']" value="'+the_opt+'">';
         }
      }
   });

   ll(parent + ' #product_attribs').html(all_attrs);
}

function UpdateUpsellQuantities(val, parent)
{
   var upsells_on = ll('#upsellCount').val();
   var upsellHtml = '';

   if (upsells_on == 1)
   {
      var upsells = val.split(',');
      var upsellLength = upsells.length - 1;

      for(i=0;i<=upsellLength;i++)
      {
         upsellHtml += '<br/>product_qty_' + upsells[i] + '<input name="product_qty_'+upsells[i]+'" value="1">';
         upsellHtml += '<br/>product attributes ' + upsells[i] + '<input name="prod_attr_'+upsells[i]+'" class="prod-attr" value="" onblur="UpdateAttributes(\''+parent+'\');">';
         upsellHtml += 'product options ' + upsells[i] + '<input name="prod_opt_'+upsells[i]+'"  class="prod-opt" value="" onblur="UpdateAttributes(\''+parent+'\');">';
      }
   }
   return upsellHtml;
}

jQuery(document).ready(
function()
{
   ToggleActions(document.getElementById('method'));
   ll('.subscriptionDropDown').change();
});

function blocknone(element)
{
   document.getElementById(element).style.display="none";
}

function blocknone_divs(alt_pay_providers,thisvalue,xtra_p)
{
   alt_pay_providers.forEach(
      function (element)
      {
         blocknone(element+xtra_p);
      }
   );
   blocknone("alt_pay"+xtra_p);
   switch (thisvalue)
   {
      case "checking":
      case "eft_germany":
         document.getElementById("check"+xtra_p).style.display="block";
      break;
      case "boleto":
         document.getElementById("cc_label"+xtra_p).innerHTML = "CNPJ or CPF ID:";
         document.getElementById("creditCardNumber").value = "111111111111111";
         document.getElementById("card"+xtra_p).style.display="block";
         document.getElementById("exp_and_cvv"+xtra_p).style.display="none";
         document.getElementById("checkAccountNumber").value = "";
         document.getElementById("checkRoutingNumber").value = "";
         document.getElementById("expirationDate").value = "";
         document.getElementById("CVV").value = "";
      break;
      case "paypal":
      case "amazon":
      case "icepay":
         document.getElementById("alt_pay"+xtra_p).style.display="block";
      break;
      case "gocoin":
      case "bitcoin_pg":
         document.getElementById("alt_pay_return_url"+xtra_p).style.display="block";
      break;
      default:
         document.getElementById("cc_label"+xtra_p).innerHTML = "creditCardNumber:";
         document.getElementById("card"+xtra_p).style.display="block";
         document.getElementById("exp_and_cvv"+xtra_p).style.display="block";
   }

}

