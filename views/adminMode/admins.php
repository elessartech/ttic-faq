{% extends 'adminTemplate.php' %}
{% block title %}
	<title>Admin Panel</title>
{% endblock %}
{% block child %}
            <table>
                <thead class="panel_dashboard_categories">
                <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Delete</td>
                        <td>Change password</td>
                </tr>
                </thead>
                <tbody class="panel_dashboard_cell">
                {% for admin in admins %}
                <tr>
                    <td>{{admin.id}}</td>
                    <td><p>{{admin.login}}</p></td>
                    <td>
                    <p><a href="?/admins/deleteUser/{{admin.id}}" class="admins_delete_link"><span class="fa fa-trash"></span> Delete</a></p>
                    </td>
                    <td>
                    <form action="?/admins/changePassword" method="POST">
                        <input type="hidden" name="id" value="{{admin.id}}">
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
                    </td>
                </tr>
                {% endfor %}
                </tbody>
        </table>
{% endblock %}