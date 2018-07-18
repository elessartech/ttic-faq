{% extends 'userTemplate.php' %}
{% block title %}
	<title>User Panel</title>
{% endblock %}
{% block child %}
{% if users is empty %}
<p>
        No users!
</p>
{% else %}
            <table>
                <thead class="panel_dashboard_categories">
                <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Email</td>
                </tr>
                </thead>
                <tbody class="panel_dashboard_cell">
                {% for user in users %}
                <tr>
                    <td>{{user.id}}</td>
                    <td><p>{{user.login}}</p></td>
                    <td><p>{{user.email}}</p></td>
                </tr>
                {% endfor %}
                </tbody>
        </table>
        {% endif %}
{% endblock %}