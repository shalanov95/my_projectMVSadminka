<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form method="POST">
        <div>
            <button name="getAllPers" class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" type="submit">
                Показать весь список администраторов
            </button>
        </div>
        <hr>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="idadmin">
                Введите id администратора.
            </label>
            <input name="idAdminPers" class="font-bold py-2 px-4 rounded" id="username" type="number" placeholder="id админа...">
            <input name="getOnePers" class="font-bold py-2 px-4 rounded py-2 px-3 hover:bg-blue-900 text-grey-darker" type="submit" value="посмореть">
        </div>
        <hr>
        <h1>Добавление администратора</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
        <label class="  text-grey-darker text-sm font-bold mb-2" for="idadmin">
                Логин
            </label>
            <input name=" setLoginPers" class="font-bold py-2 px-4 rounded" id="login" type="text" placeholder="Логин админа...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                 Пароль
            </label>
            <input name="setPasswordPers" class="font-bold py-2 px-4 rounded" id="paswword" type="password" placeholder="Пароль...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                  Права
            </label>
            <input name="setRightPers" class="font-bold py-2 px-4 rounded" id="password" type="text" placeholder="root или admin">
            <input name="setOnePers" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="Добавить">
        </div>
        <hr>
        <h1>Удаление администратора</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Введите логин администратора для его удаления
            </label>
            <input name="delAdminPers" class="font-bold py-2 px-4 rounded" id="username" type="text" placeholder=" логин админа...">
            <input name="delOnePers" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker" id="username" type="submit" value="удалить">
        </div>
    </form>
</div>
    <div>
        <?php if(isset($no)){ echo $no; }?>
    <div>
</div>
<?php if(isset($result)): ?>
<div class="bg-white   container mx-auto flex flex-wrap items-centerd">
	<table class ="text-2  border-2 rounded-mg">
		<tr>
			<th>id</th>
			<th>login</th>
			<th>password</th>
		</tr>
		<?php foreach ($result as $admin): ?>
		<tr>
			<td><?= $admin['id']; ?></td>
			<td><?= $admin['login']; ?></td>
			<td><?= $admin['password']?></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<?php endif ?>