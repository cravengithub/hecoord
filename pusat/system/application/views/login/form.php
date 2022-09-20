<script type="text/javascript">
    $(function(){
        $('#submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
    });
</script>
<h1>Login Pusat</h1
<form method="post" name="main_form" id="main_form">
    <input type="hidden" name="jquery_action" id="jquery_action"/>
    <p>
        <label for="username">Username:</label>
        <input name="l_username" size="20" class="form_field" value="admin" type="text"/>
    </p>
    <p>
        <label for="password">Password:</label>
        <input name="l_password" size="20" class="form_field" value="" type="password"/>
    </p>
    <p>
        <!--
        <input name="submit" id="submit" value="Login" type="submit"/>
        -->
        <a href="#" id="submit">Login</a>
    </p>
</form>