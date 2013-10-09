<form method="post">
    <table class="default checkboxActive">
        <caption>
            Notenverwaltung
        </caption>
        <thead>
            <tr>
                <th><?= _('Teilnehmer') ?></th>
                <th><?= _('Bestanden') ?></th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlReady($user->getFullName('full_rev')) ?></td>
                    <td><input name="user[]" type="checkbox" value="<?= $user->id ?>" <?= $noten->findOneBy('user_id', $user->id) ? "checked":"" ?>></td>
                </tr>
            <? endforeach; ?>  
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?= \Studip\Button::create(_('Speichern'), 'save') ?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>