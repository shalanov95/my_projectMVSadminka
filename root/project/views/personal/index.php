<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form method="POST">
        <div>
            <button name="getPersonal" class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" type="submit">
                Показать весь список специалистов
            </button>
        </div>
        <hr>
        <h1>Добавление специалиста</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
        <label class="  text-grey-darker text-sm font-bold mb-2" for="idadmin">
                Фамилия
            </label>
            <input name="surname" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Имя
            </label>
            <input name="name" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Отчество
            </label>
            <input name=" patronymic" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Специальность
            </label>
            <input name="profession" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                БЦК
            </label>
            <input name="uniqueKey" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Начало работы
            </label>
            <input name="dateStart" class="font-bold py-2 px-4 rounded"  type="date" placeholder="...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Дата Увольнения
            </label>
            <input name="dateEnd" class="font-bold py-2 px-4 rounded"  type="date" placeholder="...">
            <input name="add" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="Добавить">
        </div>
        <h1>Редактирование специалиста</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Введите id специалиста и заполните поля выше
            </label>
            <input name="id" class="font-bold py-2 px-4 rounded"  type="number" placeholder=" id спец...">
            <input name="up" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="редактировать">
        <hr>
        </div>
        <h1>Удалить специалиста из клиники</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
            Введите id специалиста
            </label>
            <input name="idPer" class="font-bold py-2 px-4 rounded"  type="number" placeholder="id спец...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
            Введите id клиники (или клиник через пробел)
            </label>
            <input name="idCli" class="font-bold py-2 px-4 rounded"  type="text" placeholder="id клин...">
            <input name="com" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="добавить">
            <hr>
        </div>
        <h1>Удаление специалиста</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
            Введите id кспециалиста для его удаления
            </label>
            <input name="delPersonal" class="font-bold py-2 px-4 rounded"  type="number" placeholder="id...">
            <input name="del" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="удалить">
        </div>
    </form>
</div>
<div>
<?php if(isset($result)){ ?>
<div class="bg-white   container mx-auto flex flex-wrap items-centerd">
    <table class ="text-2  border-2 rounded-mg">
        <tr class="">
            <th>id</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Специальность</th>
            <th>Уникальный БЦК</th>
            <th>Начал работать</th>
            <th>Дата Уволильнения</th>
            <th>Краткое название работы</th>
        </tr>
        <?php foreach ($result as $value): ?>
        <tr>
            <td><?= $value['IDpersonal']; ?></td>
            <td><?= $value['surname']; ?></td>
            <td><?= $value['name']?></td>
            <td><?= $value['patronymic']; ?></td>
            <td><?= $value['profession']; ?></td>
            <td><?= $value['unique_key']; ?></td>
            <td><?= $value['date_start']; ?></td>
            <td><?= $value['date_end']; ?></td>
            <td><?= $value['work']?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php } ?>