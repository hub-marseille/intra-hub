<table>
    <tr>
        <td>id</td>
        <td>username</td>
        <td>user_right</td>
        <td>id_picture</td>
        <td>deleted</td>
        <td>action</td>
    </tr>
    <?php for ($i = 0; $i < count($users); $i++):?>
        <tr>
            <td><input type="text" name="id" value="<?php echo $users[$i]['id'];?>" disabled /></td>
            <td><input type="text" name="username" value="<?php echo $users[$i]['username'];?>" disabled /></td>
            <td><input type="text" name="user_right" value="<?php echo $users[$i]['user_right'];?>" /></td>
            <td><input type="text" name="id_picture" value="<?php echo $users[$i]['id_picture'];?>" /></td>
            <td>
                <select name="deleted">
                    <option value="0" <?php if ($users[$i]['deleted'] == 0 || $users[$i]['deleted'] == null) echo "selected='selected'";?>>active</option>
                    <option value="1" <?php if ($users[$i]['deleted'] == 1) echo "selected='selected'";?>>deleted</option>
                </select>
            </td>
            <td><input type="button" name="edit" value="edit" /><input type="button" name="delete" value="delete" /></td>
        </tr>
    <?php endfor; ?>
</table>
