<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form method="POST">
        <div>
            <button name="getClinic" class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" type="submit">
                Показать весь список клиник
            </button>
        </div>
        <hr>
        <h1>Добавление клиники</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
        <label class="  text-grey-darker text-sm font-bold mb-2" for="idadmin">
               Номер
            </label>
            <input name="number" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Название
            </label>
            <input name="name" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Короткое название
            </label>
            <input name="shortName" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Адресс
            </label>
            <input name="address" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Эл. почта
            </label>
            <input name="email" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Телефон
            </label>
            <input name="phone" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Специализация
            </label>
            <input name="special" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <input name="add" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="Добавить">
        </div>
        <h1>Редактирование клиники</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Введите id клиники и заполните поля выше
            </label>
            <input name="id" class="font-bold py-2 px-4 rounded"  type="number" placeholder=" id клин...">
            <input name="up" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="редактировать">
        <hr>
        </div>
        <h1>Добавить Специалиста</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
            Введите id клиники
            </label>
            <input name="idCli" class="font-bold py-2 px-4 rounded"  type="number" placeholder="id клин...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
            Введите id специалиста/ов (через пробел)
            </label>
            <input name="idPer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="id спец...">
            <input name="com" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="добавить">
            <hr>
        </div>
        <h1>Удаление клиники</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
            Введите id клиники для его удаления
            </label>
            <input name="delClinic" class="font-bold py-2 px-4 rounded"  type="number" placeholder="id...">
            <input name="del" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="удалить">
        </div>
    </form>
</div>
<div>
    <?php if(isset($no)){ echo $no; }?>
</div>
<?php if(isset($result)): ?>
<div class="bg-white   container mx-auto flex flex-wrap items-centerd">
    <table class ="text-2  border-2 rounded-mg border-spacing: 1px;">
        <tr class="">
            <th>id</th>
            <th>Номер</th>
            <th>Название</th>
            <th>Краткое название</th>
            <th>Адресс</th>
            <th>email</th>
            <th>Телефон</th>
            <th>Специализация</th>
        </tr>
        <?php foreach ($result as $value): ?>
        <tr>
            <td><?= $value['IDclinic']; ?></td>
            <td><?= $value['number']; ?></td>
            <td><?= $value['name']?></td>
            <td><?= $value['short_name']; ?></td>
            <td><?= $value['address']; ?></td>
            <td><?= $value['email']; ?></td>
            <td><?= $value['phone']; ?></td>
            <td><?= $value['special']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>