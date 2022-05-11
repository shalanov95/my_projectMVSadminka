<div class="bg-white shadow-md rounded  flex flex-col">
    <form method="POST">
        <div>
            <select name = "clinicName">
                <?php
                    foreach ($clinics as $clinic) {
                ?>
                <option class ="bg-blue-100">
                    <?=$clinic['IDclinic'] . " - " . $clinic['short_name'];?>
                </option>
                <?php }?>
            </select>
            <button name="getAllPer" class="bg-blue-500 hover:bg-blue-900 px-8 text-white font-bold" type="submit">
                Показать весь список работников клиники.
            </button>
            <button name="getAllCli" class="bg-blue-500 hover:bg-blue-900 text-white px-8 font-bold rounded" type="submit">
                Показать весь список  клиник.
            </button>
        </div>
        <hr>
    </form>
    </div>
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
    <?php if(isset($clinicsAll)){ ?>
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
            <?php foreach ($clinicsAll as $value): ?>
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
    <?php } ?>
    <form method="POST">
    <div class="bg-white shadow-md rounded px-8  pb-8  flex flex-col">
        <div class="mb-2 container mx-auto">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="idadmin">
                Введите id или БЦ-ключ работника для просмотра информации.
            </label>
            <input name="idPerson" class="font-bold py-2 px-4 rounded" id="username" type="text" placeholder="id или БЦ...">
            <input name="getOne" class="font-bold py-2 px-4 rounded py-2 px-3 hover:bg-blue-900 text-grey-darker" type="submit" value="посмореть">
        </div>
        <b class="text-blue-600"><?php if(isset($no)){ echo $no; }?> </b>
        <hr>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
        <b>Добавление поликлиники<b>
            <div class="mb-4 container mx-auto flex flex-wrap items-center">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                    Номер
                </label>
                <input name="number" class="font-bold py-2 px-4 rounded"  type="number" placeholder="...">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                    Название
                </label>
                <input name="name" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                    Краткое название
                </label>
                <input name="shortName" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                    Адрес
                </label>
                <input name="address" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                    Эл.почта
                </label>
                <input name="email" class="font-bold py-2 px-4 rounded"  type="text" placeholder="...">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                    Телефон
                </label>
                <input name="phone" class="font-bold py-2 px-4 rounded"  type="text" placeholder="8846....">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                    Специализация
                </label>
                <input name="special" class="font-bold py-2 px-4 rounded"  type="text" placeholder="специал...">
                <input name="setOneCli" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="Добавить">
                <label class="  text-grey-darker text-sm font-bold mb-2">
                Для редактирования поликлиники следует указать Id поликлинки, и заполнить поля для добавления. И нажать кнопку Редактировать.
                </label>
                <input name="idCli" class="font-bold py-2 px-4 rounded"  type="text" placeholder="id...">
                <input name="upOneCli" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="Редактировать">
            </div>
            <hr>
        <h1>Удаление клиники</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Введите id клиники для ее удаления
            </label>
            <input name="delCli" class="font-bold py-2 px-4 rounded" id="username" type="number" placeholder="id кли...">
            <input name="delOneCli" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker" id="username" type="submit" value="удалить">
        </div>
        <hr>
        <h1>Добавление клинике уже существующих  в БД специалистов по id</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
        <label class="  text-grey-darker text-sm font-bold mb-2" >
                Введите id специалиста/специалистов через пробел
            </label>
            <input name="addPer" class="font-bold py-2 px-4 rounded" id="username" type="text" placeholder="id спе...">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Введите id клиники
            </label>
            <input name="addCli" class="font-bold py-2 px-4 rounded" id="username" type="number" placeholder="id кли...">
            <input name="add" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker" id="username" type="submit" value="добавить">
        </div>
        <hr>
        <b>Создание и добавление специалиста<b>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Фамилия
            </label>
            <input name="surnamePer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="Фамилия...">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Имя
            </label>
            <input name="namePer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="Имя...">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Отчество
            </label>
            <input name="patronymicPer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="Отчетсво...">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Специальность
            </label>
            <input name="professionPer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="Специальность...">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Уникальный БЦК
            </label>
            <input name="uniqueKeyPer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="БЦК...">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Начал работать
            </label>
            <input name="dateStartPer" class="font-bold py-2 px-4 rounded"  type="date" placeholder="31.12.1970...">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Закончил работать(необязательно указывать)
            </label>
            <input name="dateEndPer" class="font-bold py-2 px-4 rounded"  type="date" placeholder="31.12.1970...">
            <label class="  text-grey-darker text-sm font-bold mb-2">
                Указать Id места работы,(если несколько то через пробел)
            </label>
            <input name="workPer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="id...">
            <input name="setOnePer" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="Добавить">
            <label class="  text-grey-darker text-sm font-bold mb-2">
               Для редактирования сотрудника следует указать Id сотрудника, и заполнить поля для добавления. И нажать кнопку Редактировать.
            </label>
            <input name="idPer" class="font-bold py-2 px-4 rounded"  type="text" placeholder="id...">
            <input name="upOnePer" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker"  type="submit" value="Редактировать">
        </div>
        </div>
        <hr>
        <h1>Удаление специалиста</h1>
        <div class="mb-4 container mx-auto flex flex-wrap items-center">
            <label class="  text-grey-darker text-sm font-bold mb-2" >
                Введите id специалиста для его удаления
            </label>
            <input name="delPer" class="font-bold py-2 px-4 rounded" id="username" type="number" placeholder="id спец...">
            <input name="delOnePer" class="font-bold py-2 px-4 hover:bg-blue-900 rounded py-2 px-3 text-grey-darker" id="username" type="submit" value="удалить">
        </div>
    </form>
</div>