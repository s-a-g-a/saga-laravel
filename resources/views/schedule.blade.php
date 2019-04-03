<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  .codyhouse {
  text-align: center;
  margin: 40px 0;
}
/* reset css */
/* https://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section, main {
  display: block;
}
body {
  line-height: 1;
}
ol, ul {
  list-style: none;
}
blockquote, q {
  quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
  content: '';
  content: none;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}

/* style css */
/* -------------------------------- 

Primary style

-------------------------------- */
*, *::after, *::before {
  box-sizing: border-box;
}

html {
  font-size: 62.5%;
}

body {
  font-size: 1.6rem;
  font-family: "Source Sans Pro", sans-serif;
  color: #222222;
  background-color: white;
}

a {
  color: #A2B9B2;
  text-decoration: none;
}

/* -------------------------------- 

Main Components 

-------------------------------- */
.cd-schedule {
  position: relative;
  margin: 2em 0;
}

.cd-schedule::before {
  /* never visible - this is used in js to check the current MQ */
  content: 'mobile';
  display: none;
}

@media only screen and (min-width: 800px) {
  .cd-schedule {
    width: 90%;
    max-width: 1400px;
    margin: 2em auto;
  }
  .cd-schedule::after {
    clear: both;
    content: "";
    display: block;
  }
  .cd-schedule::before {
    content: 'desktop';
  }
}

.cd-schedule .timeline {
  display: none;
}

@media only screen and (min-width: 800px) {
  .cd-schedule .timeline {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    padding-top: 50px;
  }
  .cd-schedule .timeline li {
    position: relative;
    height: 50px;
  }
  .cd-schedule .timeline li::after {
    /* this is used to create the table horizontal lines */
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #EAEAEA;
  }
  .cd-schedule .timeline li:last-of-type::after {
    display: none;
  }
  .cd-schedule .timeline li span {
    display: none;
  }
}

@media only screen and (min-width: 1000px) {
  .cd-schedule .timeline li::after {
    width: calc(100% - 60px);
    left: 60px;
  }
  .cd-schedule .timeline li span {
    display: inline-block;
    -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
            transform: translateY(-50%);
  }
  .cd-schedule .timeline li:nth-of-type(2n) span {
    display: none;
  }
}

.cd-schedule .events {
  position: relative;
  z-index: 1;
}

.cd-schedule .events .events-group {
  margin-bottom: 30px;
}

.cd-schedule .events .top-info {
  width: 100%;
  padding: 0 5%;
}

.cd-schedule .events .top-info > span {
  display: inline-block;
  line-height: 1.2;
  margin-bottom: 10px;
  font-weight: bold;
}

.cd-schedule .events .events-group > ul {
  position: relative;
  padding: 0 5%;
  /* force its children to stay on one line */
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  overflow-x: scroll;
  -webkit-overflow-scrolling: touch;
}

.cd-schedule .events .events-group > ul::after {
  /* never visible - used to add a right padding to .events-group > ul */
  display: inline-block;
  content: '-';
  width: 1px;
  height: 100%;
  opacity: 0;
  color: transparent;
}

.cd-schedule .events .single-event {
  /* force them to stay on one line */
  -ms-flex-negative: 0;
      flex-shrink: 0;
  float: left;
  height: 150px;
  width: 70%;
  max-width: 300px;
  box-shadow: inset 0 -3px 0 rgba(0, 0, 0, 0.2);
  margin-right: 20px;
  -webkit-transition: opacity .2s, background .2s;
  transition: opacity .2s, background .2s;
}

.cd-schedule .events .single-event:last-of-type {
  margin-right: 5%;
}

.cd-schedule .events .single-event a {
  display: block;
  height: 100%;
  padding: .8em;
}

@media only screen and (min-width: 550px) {
  .cd-schedule .events .single-event {
    width: 40%;
  }
}

@media only screen and (min-width: 800px) {
  .cd-schedule .events {
    float: left;
    width: 100%;
  }
  .cd-schedule .events .events-group {
    width: 20%;
    float: left;
    border: 1px solid #EAEAEA;
    /* reset style */
    margin-bottom: 0;
  }
  .cd-schedule .events .events-group:not(:first-of-type) {
    border-left-width: 0;
  }
  .cd-schedule .events .top-info {
    /* vertically center its content */
    display: table;
    height: 50px;
    border-bottom: 1px solid #EAEAEA;
    /* reset style */
    padding: 0;
  }
  .cd-schedule .events .top-info > span {
    /* vertically center inside its parent */
    display: table-cell;
    vertical-align: middle;
    padding: 0 .5em;
    text-align: center;
    /* reset style */
    font-weight: normal;
    margin-bottom: 0;
  }
  .cd-schedule .events .events-group > ul {
    height: 950px;
    /* reset style */
    display: block;
    overflow: visible;
    padding: 0;
  }
  .cd-schedule .events .events-group > ul::after {
    clear: both;
    content: "";
    display: block;
  }
  .cd-schedule .events .events-group > ul::after {
    /* reset style */
    display: none;
  }
  .cd-schedule .events .single-event {
    position: absolute;
    z-index: 3;
    /* top position and height will be set using js */
    width: calc(100% + 2px);
    left: -1px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), inset 0 -3px 0 rgba(0, 0, 0, 0.2);
    /* reset style */
    -ms-flex-negative: 1;
        flex-shrink: 1;
    height: auto;
    max-width: none;
    margin-right: 0;
  }
  .cd-schedule .events .single-event a {
    padding: 1.2em;
  }
  .cd-schedule .events .single-event:last-of-type {
    /* reset style */
    margin-right: 0;
  }
  .cd-schedule .events .single-event.selected-event {
    /* the .selected-event class is added when an user select the event */
    visibility: hidden;
  }
}

@media only screen and (min-width: 1000px) {
  .cd-schedule .events {
    /* 60px is the .timeline element width */
    width: calc(100% - 60px);
    margin-left: 60px;
  }
}

.cd-schedule.loading .events .single-event {
  /* the class .loading is added by default to the .cd-schedule element
     it is removed as soon as the single events are placed in the schedule plan (using javascript) */
  opacity: 0;
}

.cd-schedule .event-name,
.cd-schedule .event-date {
  display: block;
  color: white;
  font-weight: bold;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.cd-schedule .event-name {
  font-size: 2.4rem;
}

@media only screen and (min-width: 800px) {
  .cd-schedule .event-name {
    font-size: 2rem;
  }
}

.cd-schedule .event-date {
  /* they are not included in the the HTML but added using JavScript */
  font-size: 1.4rem;
  opacity: .7;
  line-height: 1.2;
  margin-bottom: .2em;
}

.cd-schedule .single-event[data-event="event-1"],
.cd-schedule [data-event="event-1"] .header-bg {
  /* this is used to set a background color for the event and the modal window */
  background: #577F92;
}

.cd-schedule .single-event[data-event="event-1"]:hover {
  background: #618da1;
}

.cd-schedule .single-event[data-event="event-2"],
.cd-schedule [data-event="event-2"] .header-bg {
  background: #443453;
}

.cd-schedule .single-event[data-event="event-2"]:hover {
  background: #513e63;
}

.cd-schedule .single-event[data-event="event-3"],
.cd-schedule [data-event="event-3"] .header-bg {
  background: #A2B9B2;
}

.cd-schedule .single-event[data-event="event-3"]:hover {
  background: #b1c4be;
}

.cd-schedule .single-event[data-event="event-4"],
.cd-schedule [data-event="event-4"] .header-bg {
  background: #f6b067;
}

.cd-schedule .single-event[data-event="event-4"]:hover {
  background: #f7bd7f;
}

.cd-schedule .event-modal {
  position: fixed;
  z-index: 3;
  top: 0;
  right: 0;
  height: 100%;
  width: 100%;
  visibility: hidden;
  /* Force Hardware acceleration */
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
  -webkit-transform: translateX(100%);
      -ms-transform: translateX(100%);
          transform: translateX(100%);
  -webkit-transition: visibility .4s, -webkit-transform .4s;
  transition: visibility .4s, -webkit-transform .4s;
  transition: transform .4s, visibility .4s;
  transition: transform .4s, visibility .4s, -webkit-transform .4s;
  -webkit-transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
          transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
}

.cd-schedule .event-modal .header {
  position: relative;
  height: 70px;
  /* vertically center its content */
  display: table;
  width: 100%;
}

.cd-schedule .event-modal .header .content {
  position: relative;
  z-index: 3;
  /* vertically center inside its parent */
  display: table-cell;
  vertical-align: middle;
  padding: .6em 5%;
}

.cd-schedule .event-modal .body {
  position: relative;
  width: 100%;
  /* 70px is the .header height */
  height: calc(100% - 70px);
}

.cd-schedule .event-modal .event-info {
  position: relative;
  z-index: 2;
  line-height: 1.4;
  height: 100%;
  overflow: hidden;
}

.cd-schedule .event-modal .event-info > div {
  overflow: auto;
  height: 100%;
  padding: 1.4em 5%;
}

.cd-schedule .event-modal .header-bg, .cd-schedule .event-modal .body-bg {
  /* these are the morphing backgrounds - visible on desktop only */
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}

.cd-schedule .event-modal .body-bg {
  z-index: 1;
  background: white;
  -webkit-transform-origin: top left;
      -ms-transform-origin: top left;
          transform-origin: top left;
}

.cd-schedule .event-modal .header-bg {
  z-index: 2;
  -webkit-transform-origin: top center;
      -ms-transform-origin: top center;
          transform-origin: top center;
}

.cd-schedule .event-modal .close {
  /* this is the 'X' icon */
  position: absolute;
  top: 0;
  right: 0;
  z-index: 3;
  background: rgba(0, 0, 0, 0.1);
  /* replace text with icon */
  color: transparent;
  white-space: nowrap;
  text-indent: 100%;
  height: 70px;
  width: 70px;
}

.cd-schedule .event-modal .close::before, .cd-schedule .event-modal .close::after {
  /* these are the two lines of the 'X' icon */
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 2px;
  height: 22px;
  background: white;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.cd-schedule .event-modal .close::before {
  -webkit-transform: translateX(-50%) translateY(-50%) rotate(45deg);
      -ms-transform: translateX(-50%) translateY(-50%) rotate(45deg);
          transform: translateX(-50%) translateY(-50%) rotate(45deg);
}

.cd-schedule .event-modal .close::after {
  -webkit-transform: translateX(-50%) translateY(-50%) rotate(-45deg);
      -ms-transform: translateX(-50%) translateY(-50%) rotate(-45deg);
          transform: translateX(-50%) translateY(-50%) rotate(-45deg);
}

.cd-schedule .event-modal .event-date {
  display: none;
}

.cd-schedule .event-modal.no-transition {
  -webkit-transition: none;
  transition: none;
}

.cd-schedule .event-modal.no-transition .header-bg, .cd-schedule .event-modal.no-transition .body-bg {
  -webkit-transition: none;
  transition: none;
}

@media only screen and (min-width: 800px) {
  .cd-schedule .event-modal {
    /* reset style */
    right: auto;
    width: auto;
    height: auto;
    -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
            transform: translateX(0);
    will-change: transform, width, height;
    -webkit-transition: height .4s, width .4s, visibility .4s, -webkit-transform .4s;
    transition: height .4s, width .4s, visibility .4s, -webkit-transform .4s;
    transition: height .4s, width .4s, transform .4s, visibility .4s;
    transition: height .4s, width .4s, transform .4s, visibility .4s, -webkit-transform .4s;
    -webkit-transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
            transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
  }
  .cd-schedule .event-modal .header {
    position: absolute;
    display: block;
    top: 0;
    left: 0;
    height: 100%;
  }
  .cd-schedule .event-modal .header .content {
    /* reset style */
    display: block;
    padding: .8em;
  }
  .cd-schedule .event-modal .event-info > div {
    padding: 2em 3em 2em 2em;
  }
  .cd-schedule .event-modal .body {
    height: 100%;
    width: auto;
  }
  .cd-schedule .event-modal .header-bg, .cd-schedule .event-modal .body-bg {
    /* Force Hardware acceleration */
    -webkit-transform: translateZ(0);
            transform: translateZ(0);
    will-change: transform;
    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
  }
  .cd-schedule .event-modal .header-bg {
    -webkit-transition: -webkit-transform .4s;
    transition: -webkit-transform .4s;
    transition: transform .4s;
    transition: transform .4s, -webkit-transform .4s;
    -webkit-transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
            transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
  }
  .cd-schedule .event-modal .body-bg {
    opacity: 0;
    -webkit-transform: none;
        -ms-transform: none;
            transform: none;
  }
  .cd-schedule .event-modal .event-date {
    display: block;
  }
  .cd-schedule .event-modal .close, .cd-schedule .event-modal .event-info {
    opacity: 0;
  }
  .cd-schedule .event-modal .close {
    width: 40px;
    height: 40px;
    background: transparent;
  }
  .cd-schedule .event-modal .close::after, .cd-schedule .event-modal .close::before {
    background: #222222;
    height: 16px;
  }
}

@media only screen and (min-width: 1000px) {
  .cd-schedule .event-modal .header .content {
    padding: 1.2em;
  }
}

.cd-schedule.modal-is-open .event-modal {
  /* .modal-is-open class is added as soon as an event is selected */
  -webkit-transform: translateX(0);
      -ms-transform: translateX(0);
          transform: translateX(0);
  visibility: visible;
}

.cd-schedule.modal-is-open .event-modal .event-info > div {
  /* smooth scroll on iOS touch devices */
  -webkit-overflow-scrolling: touch;
}

@media only screen and (min-width: 800px) {
  .cd-schedule.animation-completed .event-modal .close,
  .cd-schedule.content-loaded.animation-completed .event-modal .event-info {
    /*  the .animation-completed class is added when the modal animation is completed
      the .content-loaded class is added when the modal content has been loaded (using ajax) */
    opacity: 1;
    -webkit-transition: opacity .2s;
    transition: opacity .2s;
  }
  .cd-schedule.modal-is-open .body-bg {
    opacity: 1;
    -webkit-transition: -webkit-transform .4s;
    transition: -webkit-transform .4s;
    transition: transform .4s;
    transition: transform .4s, -webkit-transform .4s;
    -webkit-transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
            transition-timing-function: cubic-bezier(0.5, 0, 0.1, 1);
  }
}

.cd-schedule .cover-layer {
  /* layer between the content and the modal window */
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.8);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity .4s, visibility .4s;
  transition: opacity .4s, visibility .4s;
}

.cd-schedule.modal-is-open .cover-layer {
  opacity: 1;
  visibility: visible;
}

</style>

@extends('crudbooster::admin_template')

@section('content')

<div class="cd-schedule loading">
  <div class="timeline">
    <ul>
      <li><span>09:00</span></li>
      <li><span>09:30</span></li>
      <li><span>10:00</span></li>
      <li><span>10:30</span></li>
      <li><span>11:00</span></li>
      <li><span>11:30</span></li>
      <li><span>12:00</span></li>
      <li><span>12:30</span></li>
      <li><span>13:00</span></li>
      <li><span>13:30</span></li>
      <li><span>14:00</span></li>
      <li><span>14:30</span></li>
      <li><span>15:00</span></li>
      <li><span>15:30</span></li>
      <li><span>16:00</span></li>
      <li><span>16:30</span></li>
      <li><span>17:00</span></li>
      <li><span>17:30</span></li>
      <li><span>18:00</span></li>
    </ul>
  </div> <!-- .timeline -->

  <div class="events">
    <ul>
      <li class="events-group">
        <div class="top-info"><span>Monday</span></div>

        <ul>
          <li class="single-event" data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
            <a href="#0">
              <em class="event-name">Coding</em>
            </a>
          </li>

          <li class="single-event" data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2">
            <a href="#0">
              <em class="event-name">computer architechture</em>
            </a>
          </li>

          <li class="single-event" data-start="14:00" data-end="15:15"  data-content="event-yoga-1" data-event="event-3">
            <a href="#0">
              <em class="event-name">Algorithms</em>
            </a>
          </li>
        </ul>
      </li>

      <li class="events-group">
        <div class="top-info"><span>Tuesday</span></div>

        <ul>
          <li class="single-event" data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2">
            <a href="#0">
              <em class="event-name">Computer architecture</em>
            </a>
          </li>

          <li class="single-event" data-start="11:30" data-end="13:00"  data-content="event-restorative-yoga" data-event="event-4">
            <a href="#0">
              <em class="event-name">None</em>
            </a>
          </li>

          <li class="single-event" data-start="13:30" data-end="15:00" data-content="event-abs-circuit" data-event="event-1">
            <a href="#0">
              <em class="event-name">Computer security lab</em>
            </a>
          </li>

          <li class="single-event" data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3">
            <a href="#0">
              <em class="event-name">Computer security lab</em>
            </a>
          </li>
        </ul>
      </li>

      <li class="events-group">
        <div class="top-info"><span>Wednesday</span></div>

        <ul>
          <li class="single-event" data-start="09:00" data-end="10:15" data-content="event-restorative-yoga" data-event="event-4">
            <a href="#0">
              <em class="event-name">Computer architecture</em>
            </a>
          </li>

          <li class="single-event" data-start="10:45" data-end="11:45" data-content="event-yoga-1" data-event="event-3">
            <a href="#0">
              <em class="event-name">None</em>
            </a>
          </li>

          <li class="single-event" data-start="12:00" data-end="13:45"  data-content="event-rowing-workout" data-event="event-2">
            <a href="#0">
              <em class="event-name">Computer architecture lab</em>
            </a>
          </li>

          <li class="single-event" data-start="13:45" data-end="15:00" data-content="event-yoga-1" data-event="event-3">
            <a href="#0">
              <em class="event-name">Computer architecture lab</em>
            </a>
          </li>
        </ul>
      </li>

      <li class="events-group">
        <div class="top-info"><span>Thursday</span></div>

        <ul>
          <li class="single-event" data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
            <a href="#0">
              <em class="event-name">Fundamental of software engineering</em>
            </a>
          </li>

          <li class="single-event" data-start="12:00" data-end="13:45" data-content="event-restorative-yoga" data-event="event-4">
            <a href="#0">
              <em class="event-name">None</em>
            </a>
          </li>

          <li class="single-event" data-start="15:30" data-end="16:30" data-content="event-abs-circuit" data-event="event-1">
            <a href="#0">
              <em class="event-name">Study</em>
            </a>
          </li>

          <li class="single-event" data-start="17:00" data-end="18:30"  data-content="event-rowing-workout" data-event="event-2">
            <a href="#0">
              <em class="event-name">None</em>
            </a>
          </li>
        </ul>
      </li>

      <li class="events-group">
        <div class="top-info"><span>Friday</span></div>

        <ul>
          <li class="single-event" data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2">
            <a href="#0">
              <em class="event-name">Computer architechture</em>
            </a>
          </li>

          <li class="single-event" data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1">
            <a href="#0">
              <em class="event-name">Computer security</em>
            </a>
          </li>

          <li class="single-event" data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3">
            <a href="#0">
              <em class="event-name">Study</em>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="event-modal">
    <header class="header">
      <div class="content">
        <span class="event-date"></span>
        <h3 class="event-name"></h3>
      </div>

      <div class="header-bg"></div>
    </header>

    <div class="body">
      <div class="event-info"></div>
      <div class="body-bg"></div>
    </div>

    <a href="#0" class="close">Close</a>
  </div>

  <div class="cover-layer"></div>
</div> <!-- .cd-schedule -->
<script>
    jQuery(document).ready(function($){
  var transitionEnd = 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend';
  var transitionsSupported = ( $('.csstransitions').length > 0 );
  //if browser does not support transitions - use a different event to trigger them
  if( !transitionsSupported ) transitionEnd = 'noTransition';
  
  //should add a loding while the events are organized 

  function SchedulePlan( element ) {
    this.element = element;
    this.timeline = this.element.find('.timeline');
    this.timelineItems = this.timeline.find('li');
    this.timelineItemsNumber = this.timelineItems.length;
    this.timelineStart = getScheduleTimestamp(this.timelineItems.eq(0).text());
    //need to store delta (in our case half hour) timestamp
    this.timelineUnitDuration = getScheduleTimestamp(this.timelineItems.eq(1).text()) - getScheduleTimestamp(this.timelineItems.eq(0).text());

    this.eventsWrapper = this.element.find('.events');
    this.eventsGroup = this.eventsWrapper.find('.events-group');
    this.singleEvents = this.eventsGroup.find('.single-event');
    this.eventSlotHeight = this.eventsGroup.eq(0).children('.top-info').outerHeight();

    this.modal = this.element.find('.event-modal');
    this.modalHeader = this.modal.find('.header');
    this.modalHeaderBg = this.modal.find('.header-bg');
    this.modalBody = this.modal.find('.body'); 
    this.modalBodyBg = this.modal.find('.body-bg'); 
    this.modalMaxWidth = 800;
    this.modalMaxHeight = 480;

    this.animating = false;

    this.initSchedule();
  }

  SchedulePlan.prototype.initSchedule = function() {
    this.scheduleReset();
    this.initEvents();
  };

  SchedulePlan.prototype.scheduleReset = function() {
    var mq = this.mq();
    if( mq == 'desktop' && !this.element.hasClass('js-full') ) {
      //in this case you are on a desktop version (first load or resize from mobile)
      this.eventSlotHeight = this.eventsGroup.eq(0).children('.top-info').outerHeight();
      this.element.addClass('js-full');
      this.placeEvents();
      this.element.hasClass('modal-is-open') && this.checkEventModal();
    } else if(  mq == 'mobile' && this.element.hasClass('js-full') ) {
      //in this case you are on a mobile version (first load or resize from desktop)
      this.element.removeClass('js-full loading');
      this.eventsGroup.children('ul').add(this.singleEvents).removeAttr('style');
      this.eventsWrapper.children('.grid-line').remove();
      this.element.hasClass('modal-is-open') && this.checkEventModal();
    } else if( mq == 'desktop' && this.element.hasClass('modal-is-open')){
      //on a mobile version with modal open - need to resize/move modal window
      this.checkEventModal('desktop');
      this.element.removeClass('loading');
    } else {
      this.element.removeClass('loading');
    }
  };

  SchedulePlan.prototype.initEvents = function() {
    var self = this;

    this.singleEvents.each(function(){
      //create the .event-date element for each event
      var durationLabel = '<span class="event-date">'+$(this).data('start')+' - '+$(this).data('end')+'</span>';
      $(this).children('a').prepend($(durationLabel));

      //detect click on the event and open the modal
      $(this).on('click', 'a', function(event){
        event.preventDefault();
        if( !self.animating ) self.openModal($(this));
      });
    });

    //close modal window
    this.modal.on('click', '.close', function(event){
      event.preventDefault();
      if( !self.animating ) self.closeModal(self.eventsGroup.find('.selected-event'));
    });
    this.element.on('click', '.cover-layer', function(event){
      if( !self.animating && self.element.hasClass('modal-is-open') ) self.closeModal(self.eventsGroup.find('.selected-event'));
    });
  };

  SchedulePlan.prototype.placeEvents = function() {
    var self = this;
    this.singleEvents.each(function(){
      //place each event in the grid -> need to set top position and height
      var start = getScheduleTimestamp($(this).attr('data-start')),
        duration = getScheduleTimestamp($(this).attr('data-end')) - start;

      var eventTop = self.eventSlotHeight*(start - self.timelineStart)/self.timelineUnitDuration,
        eventHeight = self.eventSlotHeight*duration/self.timelineUnitDuration;
      
      $(this).css({
        top: (eventTop -1) +'px',
        height: (eventHeight+1)+'px'
      });
    });

    this.element.removeClass('loading');
  };

  SchedulePlan.prototype.openModal = function(event) {
    var self = this;
    var mq = self.mq();
    this.animating = true;

    //update event name and time
    this.modalHeader.find('.event-name').text(event.find('.event-name').text());
    this.modalHeader.find('.event-date').text(event.find('.event-date').text());
    this.modal.attr('data-event', event.parent().attr('data-event'));

    //update event content
    this.modalBody.find('.event-info').load(event.parent().attr('data-content')+'.html .event-info > *', function(data){
      //once the event content has been loaded
      self.element.addClass('content-loaded');
    });

    this.element.addClass('modal-is-open');

    setTimeout(function(){
      //fixes a flash when an event is selected - desktop version only
      event.parent('li').addClass('selected-event');
    }, 10);

    if( mq == 'mobile' ) {
      self.modal.one(transitionEnd, function(){
        self.modal.off(transitionEnd);
        self.animating = false;
      });
    } else {
      var eventTop = event.offset().top - $(window).scrollTop(),
        eventLeft = event.offset().left,
        eventHeight = event.innerHeight(),
        eventWidth = event.innerWidth();

      var windowWidth = $(window).width(),
        windowHeight = $(window).height();

      var modalWidth = ( windowWidth*.8 > self.modalMaxWidth ) ? self.modalMaxWidth : windowWidth*.8,
        modalHeight = ( windowHeight*.8 > self.modalMaxHeight ) ? self.modalMaxHeight : windowHeight*.8;

      var modalTranslateX = parseInt((windowWidth - modalWidth)/2 - eventLeft),
        modalTranslateY = parseInt((windowHeight - modalHeight)/2 - eventTop);
      
      var HeaderBgScaleY = modalHeight/eventHeight,
        BodyBgScaleX = (modalWidth - eventWidth);

      //change modal height/width and translate it
      self.modal.css({
        top: eventTop+'px',
        left: eventLeft+'px',
        height: modalHeight+'px',
        width: modalWidth+'px',
      });
      transformElement(self.modal, 'translateY('+modalTranslateY+'px) translateX('+modalTranslateX+'px)');

      //set modalHeader width
      self.modalHeader.css({
        width: eventWidth+'px',
      });
      //set modalBody left margin
      self.modalBody.css({
        marginLeft: eventWidth+'px',
      });

      //change modalBodyBg height/width ans scale it
      self.modalBodyBg.css({
        height: eventHeight+'px',
        width: '1px',
      });
      transformElement(self.modalBodyBg, 'scaleY('+HeaderBgScaleY+') scaleX('+BodyBgScaleX+')');

      //change modal modalHeaderBg height/width and scale it
      self.modalHeaderBg.css({
        height: eventHeight+'px',
        width: eventWidth+'px',
      });
      transformElement(self.modalHeaderBg, 'scaleY('+HeaderBgScaleY+')');
      
      self.modalHeaderBg.one(transitionEnd, function(){
        //wait for the  end of the modalHeaderBg transformation and show the modal content
        self.modalHeaderBg.off(transitionEnd);
        self.animating = false;
        self.element.addClass('animation-completed');
      });
    }

    //if browser do not support transitions -> no need to wait for the end of it
    if( !transitionsSupported ) self.modal.add(self.modalHeaderBg).trigger(transitionEnd);
  };

  SchedulePlan.prototype.closeModal = function(event) {
    var self = this;
    var mq = self.mq();

    this.animating = true;

    if( mq == 'mobile' ) {
      this.element.removeClass('modal-is-open');
      this.modal.one(transitionEnd, function(){
        self.modal.off(transitionEnd);
        self.animating = false;
        self.element.removeClass('content-loaded');
        event.removeClass('selected-event');
      });
    } else {
      var eventTop = event.offset().top - $(window).scrollTop(),
        eventLeft = event.offset().left,
        eventHeight = event.innerHeight(),
        eventWidth = event.innerWidth();

      var modalTop = Number(self.modal.css('top').replace('px', '')),
        modalLeft = Number(self.modal.css('left').replace('px', ''));

      var modalTranslateX = eventLeft - modalLeft,
        modalTranslateY = eventTop - modalTop;

      self.element.removeClass('animation-completed modal-is-open');

      //change modal width/height and translate it
      this.modal.css({
        width: eventWidth+'px',
        height: eventHeight+'px'
      });
      transformElement(self.modal, 'translateX('+modalTranslateX+'px) translateY('+modalTranslateY+'px)');
      
      //scale down modalBodyBg element
      transformElement(self.modalBodyBg, 'scaleX(0) scaleY(1)');
      //scale down modalHeaderBg element
      transformElement(self.modalHeaderBg, 'scaleY(1)');

      this.modalHeaderBg.one(transitionEnd, function(){
        //wait for the  end of the modalHeaderBg transformation and reset modal style
        self.modalHeaderBg.off(transitionEnd);
        self.modal.addClass('no-transition');
        setTimeout(function(){
          self.modal.add(self.modalHeader).add(self.modalBody).add(self.modalHeaderBg).add(self.modalBodyBg).attr('style', '');
        }, 10);
        setTimeout(function(){
          self.modal.removeClass('no-transition');
        }, 20);

        self.animating = false;
        self.element.removeClass('content-loaded');
        event.removeClass('selected-event');
      });
    }

    //browser do not support transitions -> no need to wait for the end of it
    if( !transitionsSupported ) self.modal.add(self.modalHeaderBg).trigger(transitionEnd);
  }

  SchedulePlan.prototype.mq = function(){
    //get MQ value ('desktop' or 'mobile') 
    var self = this;
    return window.getComputedStyle(this.element.get(0), '::before').getPropertyValue('content').replace(/["']/g, '');
  };

  SchedulePlan.prototype.checkEventModal = function(device) {
    this.animating = true;
    var self = this;
    var mq = this.mq();

    if( mq == 'mobile' ) {
      //reset modal style on mobile
      self.modal.add(self.modalHeader).add(self.modalHeaderBg).add(self.modalBody).add(self.modalBodyBg).attr('style', '');
      self.modal.removeClass('no-transition');  
      self.animating = false; 
    } else if( mq == 'desktop' && self.element.hasClass('modal-is-open') ) {
      self.modal.addClass('no-transition');
      self.element.addClass('animation-completed');
      var event = self.eventsGroup.find('.selected-event');

      var eventTop = event.offset().top - $(window).scrollTop(),
        eventLeft = event.offset().left,
        eventHeight = event.innerHeight(),
        eventWidth = event.innerWidth();

      var windowWidth = $(window).width(),
        windowHeight = $(window).height();

      var modalWidth = ( windowWidth*.8 > self.modalMaxWidth ) ? self.modalMaxWidth : windowWidth*.8,
        modalHeight = ( windowHeight*.8 > self.modalMaxHeight ) ? self.modalMaxHeight : windowHeight*.8;

      var HeaderBgScaleY = modalHeight/eventHeight,
        BodyBgScaleX = (modalWidth - eventWidth);

      setTimeout(function(){
        self.modal.css({
          width: modalWidth+'px',
          height: modalHeight+'px',
          top: (windowHeight/2 - modalHeight/2)+'px',
          left: (windowWidth/2 - modalWidth/2)+'px',
        });
        transformElement(self.modal, 'translateY(0) translateX(0)');
        //change modal modalBodyBg height/width
        self.modalBodyBg.css({
          height: modalHeight+'px',
          width: '1px',
        });
        transformElement(self.modalBodyBg, 'scaleX('+BodyBgScaleX+')');
        //set modalHeader width
        self.modalHeader.css({
          width: eventWidth+'px',
        });
        //set modalBody left margin
        self.modalBody.css({
          marginLeft: eventWidth+'px',
        });
        //change modal modalHeaderBg height/width and scale it
        self.modalHeaderBg.css({
          height: eventHeight+'px',
          width: eventWidth+'px',
        });
        transformElement(self.modalHeaderBg, 'scaleY('+HeaderBgScaleY+')');
      }, 10);

      setTimeout(function(){
        self.modal.removeClass('no-transition');
        self.animating = false; 
      }, 20);
    }
  };

  var schedules = $('.cd-schedule');
  var objSchedulesPlan = [],
    windowResize = false;
  
  if( schedules.length > 0 ) {
    schedules.each(function(){
      //create SchedulePlan objects
      objSchedulesPlan.push(new SchedulePlan($(this)));
    });
  }

  $(window).on('resize', function(){
    if( !windowResize ) {
      windowResize = true;
      (!window.requestAnimationFrame) ? setTimeout(checkResize) : window.requestAnimationFrame(checkResize);
    }
  });

  $(window).keyup(function(event) {
    if (event.keyCode == 27) {
      objSchedulesPlan.forEach(function(element){
        element.closeModal(element.eventsGroup.find('.selected-event'));
      });
    }
  });

  function checkResize(){
    objSchedulesPlan.forEach(function(element){
      element.scheduleReset();
    });
    windowResize = false;
  }

  function getScheduleTimestamp(time) {
    //accepts hh:mm format - convert hh:mm to timestamp
    time = time.replace(/ /g,'');
    var timeArray = time.split(':');
    var timeStamp = parseInt(timeArray[0])*60 + parseInt(timeArray[1]);
    return timeStamp;
  }

  function transformElement(element, value) {
    element.css({
        '-moz-transform': value,
        '-webkit-transform': value,
      '-ms-transform': value,
      '-o-transform': value,
      'transform': value
    });
  }
});
</script>
@endsection