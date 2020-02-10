window.utag = window.utag || {};
/**
 * https://booking.eurostar.com/uk-en/train-search?origin=7015400&destination=8727100&adult=2&youth=1&child=1&infant=1&outbound-date=2020-04-28&inbound-date=2020-05-03
 */
window.utag.data = {
  market: 'uk',
  language: 'en',
  currency: 'GBP',
  sJourneyType: 'Return',
  sDateOutbound: '2020-04-28',
  sDateInbound: '2020-05-03',
  sFromCode: '7015400',
  sFromName: 'London St Pancras Int\'l',
  sToCode: '8727100',
  sToName: 'Paris Gare du Nord',
  sPaxAdult: 2,
  sPaxYouth: 1,
  sPaxChildren: 1,
  sPaxInfants: 0,
  directOrConnection: 'direct',
  pointsOrRegular: 'regular booking',
  promoBooking: 'no',
  sOutTrainsAv: 13,
  sOutTrains: '05:40,1,£36.50,£99.50,NA,NA|07:01,1,£59.50,£219.50,NA,NA|07:55,1,£49.50,£99.50,NA,NA|09:24,1,£49.50,£119.50,NA,NA|10:24,1,£59.50,£119.50,NA,NA|11:31,1,£59.50,£99.50,NA,NA|12:24,1,£49.50,£99.50,NA,NA|13:31,1,£29.00,£99.50,NA,NA|14:22,1,£45.50,£99.50,NA,NA|15:31,1,£36.50,£99.50,NA,NA|16:31,1,£29.00,£99.50,NA,NA|17:01,1,£45.50,£99.50,NA,NA|18:01,1,£45.50,£219.50,NA,NA',
  sInTrainsAv: 13,
  sInTrains: '12:03,1,£59.50,£99.50,NA,NA|13:03,1,£59.50,£99.50,NA,NA|13:25,1,£59.50,£99.50,NA,NA|14:33,1,£49.50,£99.50,NA,NA|15:03,1,£59.50,£99.50,NA,NA|16:03,1,£74.50,£99.50,NA,NA|16:33,1,£74.50,£99.50,NA,NA|17:33,1,£74.50,£99.50,NA,NA|18:03,1,£74.50,£99.50,NA,NA|19:03,1,£89.50,£99.50,NA,NA|19:33,1,£59.50,£99.50,NA,NA|20:33,1,£59.50,£99.50,NA,NA|21:03,1,£49.50,£99.50,NA,NA',
  page_name: 'SearchResults'
};

/* -------------------------------------------------------------------------- */


var dl = {...window.utag.data};
var ec = {};

ec.init = function () {
  ec.originStationCode = (dl.sFromCode) ? dl.sFromCode : 'ERROR';
  ec.destinationStationCode = (dl.sToCode) ? dl.sToCode : 'ERROR';
  ec.journeyType = (dl.sJourneyType) ? dl.sJourneyType : 'ERROR';

  console.log('[init]', ec);
};

ec.init();

/* -------------------------------------------------------------------------- */

ec.measureProductDetailsView = function (details) {
  var id = details.id || [ec.originStationCode, ec.destinationStationCode].join('-');
  var name = id; // @todo: To be reviewed
  var brand = details.brand || 'Eurostar'; // @todo: To be reviewed
  var category = details.category || 'Train ticket'; // @todo: To be reviewed
  var variant = details.variant || ec.journeyType; // @todo: To be reviewed
  // var price = null; // @todo: To be reviewed
  // var quantity = null; // @todo: To be reviewed
  // var coupon = null; // @todo: To be reviewed
  // var position = null; // @todo: To be reviewed

  var payload = {
    id,       // _cprod
    name,     // _cprodname
    brand,    // _cbrand
    category, // _ccat
    variant   // n/a
  }

  console.log('[measureProductDetailsView]', payload);

  gtag('event', 'view_item', {
    event_category: 'Ecommerce',
    event_label: name,
    items: [payload]
  });

  // window.utag.link({
  //   eventCategory: 'Ecommerce',
  //   eventAction: 'Product detail view',
  //   eventLabel: name,
  //   product_id: [id],
  //   product_name: [name],
  //   product_brand: [brand],
  //   product_category: [category],
  //   product_variant: [variant]
  // });
};

/* -------------------------------------------------------------------------- */

var fieldOriginStnCode = document.querySelector('#origin-stn-code');
var fieldDestinationStnCode = document.querySelector('#destination-stn-code');
var fieldJourneyType = document.querySelector('#journey-type');
var btnSendProductView = document.querySelector('#send-product-view');

btnSendProductView.addEventListener('click', event => {
  event.preventDefault();

  var details = {};

  ec.originStationCode = fieldOriginStnCode.value || ec.originStationCode;
  ec.destinationStationCode = fieldDestinationStnCode.value || ec.destinationStationCode;
  details.id = [ec.originStationCode, ec.destinationStationCode].join('-');

  ec.journeyType = fieldJourneyType.value || ec.journeyType;
  details.variant = ec.journeyType;

  ec.measureProductDetailsView(details);
});