<?php
/*
 * 对于i18n的实现方法有两种：
 *      1.利用lavarel的trans全局helper方法实现服务器端翻译,文本信息存储在ressource/lang/.php下
 *      然后再以参数的形式传递给view,相当于服务器端完成的翻译渲染
 *      2.利用js的i18n库进行i18n,本文信息存储在public/lang/.json下,浏览器ajax请求翻译文件
 *      属于浏览器实现翻译渲染




*/

