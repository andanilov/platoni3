## 1. Добавление заданий в БД

1. quests_templates - Типы заданий (
    название,
    метка)

2. quest_levels_templates - Уровни заданий каждого типа (
    quests_templates.название,
    уровень,
    минимальное число,
    максимальное число,
    время на пример,
    количество примеров в задании,
    разрешён ли отрицательный ответ)
 
3. quests_map - Карта заданий (
    Уровень игры для группировки заданий,
    quest_levels_templates.уровень)

Алгоритм заполнения:
- Заполняем типы заданий
- Настраиваем уровни сложности для каждого типа задания
- Составляем карту заданий: Для каждого уровня игры - несколько типов заданий с несколькими уровнями сложности


### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

