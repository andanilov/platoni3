export function useDateText(date) {

let [today, yersterday, dayBeforeYersterday] = [new Date(), new Date(Date.now()-86400000), new Date(Date.now()-172800000)]

const getDateByTpl = (d) => `${d.getFullYear()}-${String(d.getMonth() + 1).length < 2 ? '0' + (d.getMonth() + 1) : d.getMonth() + 1 }-${d.getDate()}`

console.log(getDateByTpl(today));

    switch (date) {
        case  getDateByTpl(today):
            return 'сегодня'
        case  getDateByTpl(yersterday):
            return 'вчера'
        case  getDateByTpl(dayBeforeYersterday):
            return 'позавчера'
        default:
            return date
    }

}
