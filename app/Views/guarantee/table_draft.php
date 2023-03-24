<?php
$list = $list ?? array();
?>
<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th class="text-center border-right">Nomor Jaminan</th>
            <th class="text-center">Jenis Jaminan</th>
            <th>Principal</th>
            <th class="text-center border-left">Nilai Jaminan</th>
            <th class="text-center border-left"><i class="fas fa-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $ls) : ?>
            <tr>
                <td class="text-center border-right"><?= $ls['nomor']; ?></td>
                <td class="text-center"><?= $ls['jenis']; ?></td>
                <td>PT. FIBER TECHNOLOGIES INDONESIA</td>
                <td class="text-center border-left">Rp. <?= nformat($ls['nilai']); ?></td>
                <td class="py-0 align-middle text-center border-left">
                    <a href="/guarantee/detail" class="btn btn-info btn-sm text-bold"><i class="fas fa-info-circle mr-2"></i>Detail</a>
                    <a href="/guarantee/detail" class="btn btn-danger ml-1 btn-sm disabled"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>