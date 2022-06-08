export function useDateText(date) {

let [
  today,
  yersterday,
  dayBeforeYersterday
] = [
  new Date(),
  new Date(Date.now()-86400000),
  new Date(Date.now()-172800000)
];

const addFirstZero = (text) => String(text).length - 1 ? text : `0${text}`;
const getDateByTpl = (d) => `${d.getFullYear()}-${addFirstZero(d.getMonth() + 1)}-${addFirstZero(d.getDate())}`

  switch (date) {
    case getDateByTpl(today):
      return 'сегодня'
    case getDateByTpl(yersterday):
      return 'вчера'
    case getDateByTpl(dayBeforeYersterday):
      return 'позавчера'
    default:
      return date
    }

}
