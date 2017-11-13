var job = "fireman_0.png|fireman|Mum's eyes popped to see me bringing home the fireman.|Мама очень удивилась, когда он увидела, что я веду домой пожарника.||farmer_0.png|farmer|They work for a farmer.|Они работают у фермера.||farmer_0.png|farmer|Joe was just a simple farmer.|Джо был простым фермером.||farmer_0.png|farmer|He is a sober, hardworking farmer.|Он трезвый, работящий крестьянин.||policeman_0.png|policeman|The policeman blew his whistle.|Полицейский свистнул в свисток.||taxidriver_0.png|taxi driver|'Where to?' the taxi driver asked me.|'Куда?' - спросил меня таксист.||taxidriver_0.png|taxi driver|The taxi driver said I was the first pickup that he'd had all evening.|Таксист сказал, что я его первый пассажир за весь вечер.||teacher_0.png|teacher|She was certified as a teacher.|Она получила диплом учителя.||teacher_0.png|teacher|Experience is a great teacher.|Опыт — великий учитель.||doctor_0.png|doctor|You want to see a doctor.|Тебе следует пойти к врачу.||doctor_0.png|doctor|My head reels, doctor.|Доктор, у меня кружится голова.||doctor_0.png|doctor|Let me by, I'm a doctor.|Пропустите меня, я доктор.";

function funcLoad() {
    var tbody = document.getElementById('tbody');
    var arr1 = job.split('||');
    for (var i = 0; i < arr1.length; i++) {
        var arr2 = arr1[i].split('|');
        var el_tr = document.createElement('tr');
        var el_td = '';
        for (var j = 0; j < arr2.length; j++) {
            if (arr2[j].indexOf('png') !== -1) {
                el_td += '<td><img src="img_job/' + arr2[j] + '" alt="PHOTO"></td>';
            }
            /*if (j === 0) {
             el_td += '<td><img src="img_job/' + arr2[j] + '" alt="PHOTO"></td>';
             }*/ else el_td += '<td>' + arr2[j] + '</td>';
        }
        el_tr.innerHTML = el_td;
        el_tr.setAttribute('onclick', 'alert(this.childNodes[1].innerText)');
        tbody.appendChild(el_tr);
    }
}

