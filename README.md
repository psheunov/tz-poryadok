### Поиск второго по встречаемости символа в строке
параметр **text** обязательный
***
Пример
```
https://mysite.ru/api/search-symbol/?text=tttssa
```
Результат
```json
{
    "result" : "s"
}
```
### Определить является ли строка палиндромом
параметр **text** обязательный
***
Пример
```
https://mysite.ru/api/palindrome/?text=stats
```
Результат
```json
{
    "result" : true
}
```
### Тесты
```bash
php artisan test
```
