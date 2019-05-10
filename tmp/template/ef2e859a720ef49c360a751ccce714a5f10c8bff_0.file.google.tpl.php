<?php
/* Smarty version 3.1.33, created on 2019-05-10 02:44:45
  from 'C:\xampp\htdocs\Framework-PHP\views\usuarios\google.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd4c97dbd90e5_49458855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef2e859a720ef49c360a751ccce714a5f10c8bff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Framework-PHP\\views\\usuarios\\google.tpl',
      1 => 1557449082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd4c97dbd90e5_49458855 (Smarty_Internal_Template $_smarty_tpl) {
?>
      <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="693124699870-sq742idpo8ekbg120msg2cl2dm1t104p.apps.googleusercontent.com">
    <?php echo '<script'; ?>
 src="https://apis.google.com/js/platform.js" async defer><?php echo '</script'; ?>
>
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Login Google</h1>
<br>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <?php echo '<script'; ?>
>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile