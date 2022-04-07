function markActivityStatus(stat, elem)
{
    let sibling = getSiblings(elem)
    // console.log(typeof(siblings))
    console.log(sibling[0])
    if(stat)
    {
        elem.classList.remove("bi-check-circle");
        elem.classList.add("bi-check-circle-fill");
        sibling[0].classList.remove("bi-x-circle-fill")
        sibling[0].classList.add("bi-x-circle")
    }else
    {
        elem.classList.remove("bi-x-circle");
        elem.classList.add("bi-x-circle-fill");
        sibling[0].classList.remove("bi-check-circle-fill")
        sibling[0].classList.add("bi-check-circle")
    }
}

