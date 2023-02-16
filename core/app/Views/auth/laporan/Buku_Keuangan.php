<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
    html {
      font-family: Calibri, Arial, Helvetica, sans-serif;
      font-size: 11pt;
      background-color: white
    }

    a.comment-indicator:hover+div.comment {
      background: #ffd;
      position: absolute;
      display: block;
      border: 1px solid black;
      padding: 0.5em
    }

    a.comment-indicator {
      background: red;
      display: inline-block;
      border: 1px solid black;
      width: 0.5em;
      height: 0.5em
    }

    div.comment {
      display: none
    }

    table {
      border-collapse: collapse;
      page-break-after: always
    }

    .gridlines td {
      border: 1px dotted black
    }

    .gridlines th {
      border: 1px dotted black
    }

    .b {
      text-align: center
    }

    .e {
      text-align: center
    }

    .f {
      text-align: right
    }

    .inlineStr {
      text-align: left
    }

    .n {
      text-align: right
    }

    .s {
      text-align: left
    }

    td.style0 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style0 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style1 {
      vertical-align: bottom;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Tahoma';
      font-size: 12pt;
      background-color: white
    }

    th.style1 {
      vertical-align: bottom;
      text-align: right;
      padding-right: 0px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Tahoma';
      font-size: 12pt;
      background-color: white
    }

    td.style2 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 14pt;
      background-color: #FFFFFF
    }

    th.style2 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 14pt;
      background-color: #FFFFFF
    }

    td.style3 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    th.style3 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    td.style4 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style4 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style5 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style5 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 1px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style6 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style6 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style7 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style7 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style8 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style8 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style9 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style9 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style10 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style10 {
      vertical-align: middle;
      text-align: center;
      border-bottom: none #000000;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style11 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style11 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style12 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style12 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style13 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style13 {
      vertical-align: middle;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style14 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style14 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style15 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style15 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style16 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style16 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: none #000000;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style17 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style17 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 2px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style18 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style18 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style19 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style19 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style20 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style20 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style21 {
      vertical-align: bottom;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style21 {
      vertical-align: bottom;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style22 {
      vertical-align: bottom;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style22 {
      vertical-align: bottom;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style23 {
      vertical-align: bottom;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style23 {
      vertical-align: bottom;
      border-bottom: 1px solid #000000 !important;
      border-top: none #000000;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style24 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style24 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 2px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style25 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style25 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style26 {
      vertical-align: bottom;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style26 {
      vertical-align: bottom;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 1px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style27 {
      vertical-align: bottom;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style27 {
      vertical-align: bottom;
      border-bottom: 2px solid #000000 !important;
      border-top: 1px solid #000000 !important;
      border-left: 1px solid #000000 !important;
      border-right: 2px solid #000000 !important;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style28 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style28 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style29 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    th.style29 {
      vertical-align: bottom;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      color: #000000;
      font-family: 'Calibri';
      font-size: 10pt;
      background-color: white
    }

    td.style30 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    th.style30 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    td.style31 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 45px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    th.style31 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 45px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    td.style32 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    th.style32 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      color: #000000;
      font-family: 'Calibri';
      font-size: 11pt;
      background-color: white
    }

    td.style33 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 45px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    th.style33 {
      vertical-align: bottom;
      text-align: left;
      padding-left: 45px;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    td.style34 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    th.style34 {
      vertical-align: bottom;
      text-align: center;
      border-bottom: none #000000;
      border-top: none #000000;
      border-left: none #000000;
      border-right: none #000000;
      font-weight: bold;
      font-style: italic;
      color: #000000;
      font-family: 'Times New Roman';
      font-size: 10pt;
      background-color: white
    }

    table.sheet0 col.col0 {
      width: 42pt
    }

    table.sheet0 col.col1 {
      width: 26.43333303pt
    }

    table.sheet0 col.col2 {
      width: 79.97777686pt
    }

    table.sheet0 col.col3 {
      width: 79.97777686pt
    }

    table.sheet0 col.col4 {
      width: 132.16666515pt
    }

    table.sheet0 col.col5 {
      width: 48.12222167pt
    }

    table.sheet0 col.col6 {
      width: 82.01111017pt
    }

    table.sheet0 col.col7 {
      width: 25.07777749pt
    }

    table.sheet0 col.col8 {
      width: 62.35555484pt
    }

    table.sheet0 col.col9 {
      width: 75.91111024pt
    }

    table.sheet0 col.col10 {
      width: 111.15555428pt
    }

    table.sheet0 col.col11 {
      width: 46.76666613pt
    }

    table.sheet0 col.col12 {
      width: 82.01111017pt
    }

    table.sheet0 tr {
      height: 15pt
    }

    table.sheet0 tr.row1 {
      height: 15.75pt
    }

    table.sheet0 tr.row2 {
      height: 18.75pt
    }

    table.sheet0 tr.row4 {
      height: 15.75pt
    }

    table.sheet0 tr.row5 {
      height: 25.5pt
    }

    table.sheet0 tr.row6 {
      height: 15.75pt
    }

    table.sheet0 tr.row7 {
      height: 15.75pt
    }

    table.sheet0 tr.row11 {
      height: 15.75pt
    }
  </style>
</head>

<body>
  <style>
    @page {
      margin-left: 0.75in;
      margin-right: 0.75in;
      margin-top: 1in;
      margin-bottom: 1in;
    }

    body {
      margin-left: 0.75in;
      margin-right: 0.75in;
      margin-top: 1in;
      margin-bottom: 1in;
    }
  </style>
  <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0">
    <col class="col0">
    <col class="col1">
    <col class="col2">
    <col class="col3">
    <col class="col4">
    <col class="col5">
    <col class="col6">
    <col class="col7">
    <col class="col8">
    <col class="col9">
    <col class="col10">
    <col class="col11">
    <col class="col12">
    <tbody>
      <tr class="row0">
        <td class="column0">&nbsp;</td>
        <td class="column1">&nbsp;</td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11">&nbsp;</td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row1">
        <td class="column0">&nbsp;</td>
        <td class="column1">&nbsp;</td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11">&nbsp;</td>
        <td class="column12 style1 null"></td>
      </tr>
      <tr class="row2">
        <td class="column0">&nbsp;</td>
        <td class="column1 style2 s style2" colspan="12">BUKU KEUANGAN</td>
      </tr>
      <tr class="row3">
        <td class="column0">&nbsp;</td>
        <td class="column1 style3 null"></td>
        <td class="column2 style3 null"></td>
        <td class="column3 style3 null"></td>
        <td class="column4 style3 null"></td>
        <td class="column5 style3 null"></td>
        <td class="column6 style3 null"></td>
        <td class="column7 style3 null"></td>
        <td class="column8 style3 null"></td>
        <td class="column9 style3 null"></td>
        <td class="column10 style3 null"></td>
        <td class="column11 style3 null"></td>
        <td class="column12 style3 null"></td>
      </tr>
      <tr class="row4">
        <td class="column0">&nbsp;</td>
        <td class="column1 style3 null"></td>
        <td class="column2 style3 null"></td>
        <td class="column3 style3 null"></td>
        <td class="column4 style3 null"></td>
        <td class="column5 style3 null"></td>
        <td class="column6 style3 null"></td>
        <td class="column7 style3 null"></td>
        <td class="column8 style3 null"></td>
        <td class="column9 style3 null"></td>
        <td class="column10 style3 null"></td>
        <td class="column11 style3 null"></td>
        <td class="column12 style3 null"></td>
      </tr>
      <tr class="row5">
        <td class="column0">&nbsp;</td>
        <td class="column1 style4 s style9" rowspan="2">NO</td>
        <td class="column2 style5 s style10" rowspan="2">TANGGAL, BULAN, TAHUN</td>
        <td class="column3 style6 s style11" rowspan="2">SUMBER DANA</td>
        <td class="column4 style5 s style10" rowspan="2">URAIAN</td>
        <td class="column5 style5 s style10" rowspan="2">NOMOR BUKTI KAS</td>
        <td class="column6 style7 s">JUMLAH PENERIMAAN </td>
        <td class="column7 style6 s style11" rowspan="2">NO</td>
        <td class="column8 style5 s style10" rowspan="2">TANGGAL, BULAN, TAHUN</td>
        <td class="column9 style6 s style11" rowspan="2">SUMBER DANA</td>
        <td class="column10 style5 s style10" rowspan="2">URAIAN</td>
        <td class="column11 style5 s style10" rowspan="2">NOMOR BUKTI KAS</td>
        <td class="column12 style8 s">JUMLAH PENGELUARAN </td>
      </tr>
      <tr class="row6">
        <td class="column0">&nbsp;</td>
        <td class="column6 style12 s">(Rp.)</td>
        <td class="column12 style13 s">(Rp.)</td>
      </tr>
      <tr class="row7">
        <td class="column0">&nbsp;</td>
        <td class="column1 style14 n">1</td>
        <td class="column2 style15 n">2</td>
        <td class="column3 style16 n">3</td>
        <td class="column4 style14 n">4</td>
        <td class="column5 style15 n">5</td>
        <td class="column6 style14 n">6</td>
        <td class="column7 style15 n">7</td>
        <td class="column8 style14 n">8</td>
        <td class="column9 style16 n">9</td>
        <td class="column10 style15 n">10</td>
        <td class="column11 style14 n">11</td>
        <td class="column12 style17 n">12</td>
      </tr>
      <tr class="row8">
        <td class="column0">&nbsp;</td>
        <td class="column1 style18 null">fsfes</td>
        <td class="column2 style19 null">ergeg</td>
        <td class="column3 style19 null">greg</td>
        <td class="column4 style19 null">gerg</td>
        <td class="column5 style19 null">erger</td>
        <td class="column6 style19 null">eger</td>
        <td class="column7 style19 null"></td>
        <td class="column8 style19 null"></td>
        <td class="column9 style19 null"></td>
        <td class="column10 style19 null"></td>
        <td class="column11 style19 null"></td>
        <td class="column12 style20 null"></td>
      </tr>
      <tr class="row9">
        <td class="column0">&nbsp;</td>
        <td class="column1 style18 null">gerger</td>
        <td class="column2 style19 null"></td>
        <td class="column3 style19 null"></td>
        <td class="column4 style19 null"></td>
        <td class="column5 style19 null"></td>
        <td class="column6 style19 null"></td>
        <td class="column7 style19 null"></td>
        <td class="column8 style19 null"></td>
        <td class="column9 style19 null"></td>
        <td class="column10 style19 null"></td>
        <td class="column11 style19 null"></td>
        <td class="column12 style20 null"></td>
      </tr>
      <tr class="row10">
        <td class="column0">&nbsp;</td>
        <td class="column1 style21 null"></td>
        <td class="column2 style22 null"></td>
        <td class="column3 style22 null"></td>
        <td class="column4 style22 null"></td>
        <td class="column5 style22 null"></td>
        <td class="column6 style22 null"></td>
        <td class="column7 style22 null"></td>
        <td class="column8 style22 null"></td>
        <td class="column9 style22 null"></td>
        <td class="column10 style22 null"></td>
        <td class="column11 style22 null"></td>
        <td class="column12 style23 null"></td>
      </tr>
      <tr class="row11">
        <td class="column0">&nbsp;</td>
        <td class="column1 style24 s style25" colspan="4">JUMLAH</td>
        <td class="column5 style26 null"></td>
        <td class="column6 style26 null"></td>
        <td class="column7 style26 null"></td>
        <td class="column8 style25 s style25" colspan="4">JUMLAH</td>
        <td class="column12 style27 null"></td>
      </tr>
      <tr class="row12">
        <td class="column0">&nbsp;</td>
        <td class="column1 style28 null"></td>
        <td class="column2 style28 null"></td>
        <td class="column3 style28 null"></td>
        <td class="column4 style28 null"></td>
        <td class="column5 style29 null"></td>
        <td class="column6 style29 null"></td>
        <td class="column7 style29 null"></td>
        <td class="column8 style28 null"></td>
        <td class="column9 style28 null"></td>
        <td class="column10 style28 null"></td>
        <td class="column11 style28 null"></td>
        <td class="column12 style29 null"></td>
      </tr>
      <tr class="row13">
        <td class="column0">&nbsp;</td>
        <td class="column1">&nbsp;</td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style30 s">Nama Kota, …tanggal … bulan… tahun</td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row14">
        <td class="column0">&nbsp;</td>
        <td class="column1 style31 null"></td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style32 null"></td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row15">
        <td class="column0">&nbsp;</td>
        <td class="column1 style31 s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui</td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style32 null"></td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row16">
        <td class="column0">&nbsp;</td>
        <td class="column1 style33 s">Ketua Umum/Ketua</td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style34 s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bendahara</td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row17">
        <td class="column0">&nbsp;</td>
        <td class="column1 style33 null"></td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style32 null"></td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row18">
        <td class="column0">&nbsp;</td>
        <td class="column1 style33 s">&nbsp;&nbsp;&nbsp;&nbsp;Tanda tangan</td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style34 s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanda tangan</td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row19">
        <td class="column0">&nbsp;</td>
        <td class="column1 style33 null"></td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style32 null"></td>
        <td class="column12">&nbsp;</td>
      </tr>
      <tr class="row20">
        <td class="column0">&nbsp;</td>
        <td class="column1 style33 s">&nbsp;&nbsp;&nbsp;&nbsp;Nama Jelas</td>
        <td class="column2">&nbsp;</td>
        <td class="column3">&nbsp;</td>
        <td class="column4">&nbsp;</td>
        <td class="column5">&nbsp;</td>
        <td class="column6">&nbsp;</td>
        <td class="column7">&nbsp;</td>
        <td class="column8">&nbsp;</td>
        <td class="column9">&nbsp;</td>
        <td class="column10">&nbsp;</td>
        <td class="column11 style34 s">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Jelas</td>
        <td class="column12">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</body>

</html>