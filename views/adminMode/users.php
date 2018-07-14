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
                        <td>Email</td>
                        <td>Delete</td>
                        <td>Make admin</td>
                        <td>Change password</td>
                </tr>
                </thead>
                <tbody class="panel_dashboard_cell">
                {% for user in users %}
                <tr>
                    <td>{{user.id}}</td>
                    <td><p>{{user.login}}</p></td>
                    <td><p>{{user.email}}</p></td>
                    <td>
                    <p><a href="?/adminAdmins/deleteUser/{{user.id}}" class="admins_delete_link"><span class="fa fa-trash"></span> Delete</a></p>
                    </td>
                    <td>
                        <form action="?/users/makeAdmin" method="POST" class="admins_delete_link">
                            <input type="hidden" name="id" value="{{user.id}}">
                            <input type="hidden" name="login" value="{{user.login}}">
                            <span class="fa fa-user-plus"></span> 
                            <input type="submit" name="makeadmin" value="Make admin" class="users_button_make_admin">	
                        </form>
                       <!-- <a href="?/adminAdmins/makeAdmin/" class="admins_delete_link"><span class="fa fa-user-plus"></span> Make admin</a>-->
                    </td>
                    <td>
                    <form action="?/admin/change-password" method="POST">
                        <input type="hidden" name="id" value="{{user.id}}">
                        <input type="hidden" name="login" value="{{user.login}}">
                        <input type="hidden" name="login" value="{{user.email}}">
                        <div>
                            <input type="password" name="old" placeholder="Previous Password" class="old_pass">
                        </div>
                        <div>
                            <input type="password" name="new" placeholder="New Password" class="new_pass">
                        </div>
                        <input type="submit" name="changepassword" value="Change" class="changepass_submit">	
                    </form>
                    </td>
                </tr>
                {% endfor %}
                </tbody>
        </table>
{% endblock %}