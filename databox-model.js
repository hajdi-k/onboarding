let b = {
	data: [
		{
			key: "sales", // metric name, prop is KEY
			value: 8500, // metric value,
			unit: 'USD', // metric unit, describes metric value, doesn't add dimension,
			date: '2018-01-20 16:07:37-06:00',
			attributes: {
				channel: 'online', // dimension [channel]
				'another dimension': '3d' // another dimension?,
			}
		},
		{
			key: "sales",
			value: 5200,
			unit: 'EUR',
			date: '2018-01-20',
			attributes: {
				channel: 'retail',
				'another dimension': '3d'
			}
		},
		{
			key: "sales",
			value: 6000,
			/* Not sure how it plays with date? But this does make the metric NON-AGGREGATABLE
			"periodFrom" : '2021-03-01 00:00:00',
			"periodTo" : '2021-03-16 00:00:00'
			*/
			attributes: {
				channel: 'retail',
				'another dimension': '4d'
			}
		}
	],
	ensureUnique: true // if multiple metrics have the same date, ex: "date": "2021-01-20", only the last is saved (updating a daily value multiple times per day). To prevent this and save as separate items, pass ensureUnique
};