{% extends 'userTemplate.php' %}
{% block title %}
	<title>User Panel</title>
{% endblock %}
{% block child %}
    <div class="settings_main">
        <h1>Profile</h1>
    </div>

                <div class="settings_container">
                {% for user in user_info %}
                    <div class="settings_cell">
                        <form action="?/settings/changeUsername" method="POST">
                            <input type="hidden" name="id" value="{{user.id}}">
                            <h2 class="settings_header">Username: </h2>
                            <p><input type="text" value="{{user.login}}" name="login" class="settings_text"></p>
                            <button type="submit" name="changeusername" class="settings_input">Change</button>
                        </form>
                        </div>
                        <div class="settings_cell">
                        <form action="?/settings/changeEmail" method="POST">
                            <input type="hidden" name="id" value="{{user.id}}">
                            <h2 class="settings_header">Email: </h2>
                            <p><input type="email" name="email" value="{{user.email}}" class="settings_text"></p>
                            <button type="submit" name="changeemail" class="settings_input">Change</button>
                        </form>
                        </div>
                        <div class="settings_cell">
                        <form action="?/settings/changePassword" method="POST">
                                <input type="hidden" name="id" value="{{user.id}}">
                                <h2 class="settings_header">Password: </h2>
                                <div>
                                <input type="password" name="old_pass" placeholder="Previous Password" class="old_pass">
                                </div>
                                <div>
                                <input type="password" name="new_pass" placeholder="New Password" class="new_pass">
                                </div>
                                <div>
                                <input type="password" name="confirm_pass" placeholder="Confirm Password" class="new_pass">
                                </div>
                                <input type="submit" name="changepassword" value="Change" class="changepass_submit">	
                        </form>
                    </div>
                    {% endfor %}
                </div>
{% endblock %}