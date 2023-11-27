<?php

namespace Ejercicio314;

interface JSerializable {
    public function toJSON(): string;

    public function toSerialize(): string;
}