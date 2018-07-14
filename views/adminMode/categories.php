{% extends 'adminTemplate.php' %}
{% block title %}
	<title>Admin Panel</title>
{% endblock %}
{% block child %}
            <form class="add_categories_container" method="POST" action="?/categories/addCategory">
                <input type="text" name="new_category" placeholder="Add category" class="add_categories_input">
                <input type="submit" name="new_category_submit" value="Add" class="add_categories_submit">
            </form>
            <table>
                <thead class="panel_dashboard_categories">
                <tr>
                        <td>Title</td>
                        <td>Delete category</td>
                        <td>Rename category</td>
                </tr>
                </thead>
                <tbody class="panel_dashboard_cell">
                {% for category in categories %}
                <tr>
                    <td>{{category.category}}</td>
                    <td>
                    <p><a href="?/categories/deleteCategory/{{category.id}}" class="admins_delete_link"><span class="fa fa-trash"></span> Delete</a></p>
                    </td>
                    <td>
                    <form action="?/categories/changeTitle" method="POST">
									<input type="hidden" name="id" value="{{category.id}}">
									<div>
										<input type="text" name="new_title" placeholder="New category name" class="new_pass">
									</div>
									    <input type="submit" name="changepassword" value="Change" class="changepass_submit">	
								</form>
                    </td>
                </tr>
                {% endfor %}
                </tbody>
        </table>
{% endblock %}