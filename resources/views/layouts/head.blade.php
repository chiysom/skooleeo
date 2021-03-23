<title>Skooleeo</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="." />
 
<!-- Libs CSS -->
<link rel="stylesheet" href="{{ asset('assets/fonts/feather/feather.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/quill/dist/quill.core.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/libs/highlightjs/styles/vs2015.css') }}" />

<!-- Map -->
<link href="../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css') }}" rel="stylesheet" />

<!-- Theme CSS -->
  
<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}" id="stylesheetLight">
<link rel="stylesheet" href="{{ asset('assets/css/theme-dark.min.css') }}" id="stylesheetDark">

<style>
  body {
    display: none;
  }
  /* footer */

 .page-footer {
  margin-top: 0px;
}

.page-footer__wave {
  overflow: hidden;
}

.page-footer__wave svg {
  height: 100%;
  width: 110%;
}
.page-footer__content {
  /* background: #ebf2ff; */
  background: #152e4d;
  color: white;
}

.page-footer__contact-card {
  background: white;
  color: black;
  width: 100%;
  max-width: 350px;
  padding: 12px 24px;
  border-radius: 7px;
  -webkit-box-shadow: 0px 0px 20px -1px rgb(36, 36, 36);
  -moz-box-shadow: 0px 0px 20px -1px rgb(36, 36, 36);
  box-shadow: 0px 0px 20px -1px rgb(36, 36, 36);
}
/*@media (min-width: 768px) {
  .page-footer__contact-card {
    padding: 12px 24px 30px 24px;
  }
}*/
.page-footer__contact-card .contact-card__header {
  font-size: 14px;
  opacity: 0.5;
  text-transform: uppercase;
}

.page-footer__contact-card .contact-card__description {
  font-size: 13px;
}

.page-footer__contact-card .contact-card__link {
  color: black !important;
}

.page-footer__contact-card .contact-card__link:hover {
  text-decoration: unset !important;
}

.page-footer__item,
.copyright {
  opacity: 0.6;
  color: white !important;
  font-size: 14px;
  margin-bottom: 1rem;
}

.page-footer__item:hover {
  color: white !important;
  text-decoration: unset;
  transition: 0.5s;
  opacity: 1;
}
.pagination li {
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    color: blue;
    background-color: white;
    font-size: 1em;
  }
  .pagination li a{
    color:blue;
  }
  .pagination .active {
    background-color: dodgerblue;
  }
  
.pagination  li:hover:not(.active) {background-color: lightgray;}
</style>
@section('headSection')
@show