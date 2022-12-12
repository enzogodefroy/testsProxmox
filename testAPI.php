<?php

require_once 'vendor/autoload.php';

use Proxmox\PVE;

$proxmox = new PVE("149.202.94.223", "caisi", "ilovedev", 8006, "pve");


$parNode = $firstNodes = $proxmox->nodes()->get()["data"][0]["node"];

$vms = $proxmox->nodes()->node($parNode)->qemu()->get()['data'];

$vmIds = Array();

foreach ($vms as $vm) {
    $vmIds[] = $vm ["vmid"];
}

foreach ($vmIds as $vmId) {
    $proxmox->nodes()->node($parNode)->qemu()->vmId($vmId)->status()->shutdown();
}