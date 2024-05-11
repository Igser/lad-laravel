<?php

declare(strict_types=1);

namespace App\Enums;

enum Permissions: string
{
    case ShowUsers = 'show users';
    case EditUsers = 'edit users';
    case CreateUsers = 'create users';
    case DeleteUsers = 'delete users';
    case ShowSuggestions = 'show suggestions';
    case EditSuggestions = 'edit suggestions';
    case CreateSuggestions = 'create suggestions';
    case DeleteSuggestions = 'delete suggestions';

    public function getName(): string
    {
        return match ($this) {
            self::ShowUsers => 'Просмотр пользователей',
            self::EditUsers => 'Редактирование пользователей',
            self::CreateUsers => 'Создание пользователей',
            self::DeleteUsers => 'Удаление пользователей',
            self::ShowSuggestions => 'Просмотр предложений',
            self::EditSuggestions => 'Редактирование предложений',
            self::CreateSuggestions => 'Создание предложений',
            self::DeleteSuggestions => 'Удаление предложений',
        };
    }

    public function getValue(): string
    {
        return $this->value;
    }

}
